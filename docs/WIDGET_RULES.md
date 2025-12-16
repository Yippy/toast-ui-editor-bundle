## Widget Rules

With Toast UI Editor Version 3, you are able to create Widget Rules that can act like Merge Tags.

You can have multiple Widget Rules within Config or PHP, here is an example for an RegEx for `[@text](number)`

### Configuration Method

```yaml
#config/packages/toast_ui_editor.yaml
yippy_toast_ui_editor:
    default_config: basic_config
    configs:
        basic_config:
            editor:
                options:
                    widget_rules:
                        - |
                            rule: /\[(@\S+)\]\((\S+)\)/,
                            toDOM(text) {
                                const rule = /\[(@\S+)\]\((\S+)\)/;
                                const matched = text.match(rule);
                                const span = document.createElement(`span`);
                                span.innerHTML = `<span class="badge badge-primary" href="`+matched[2]+`">`+matched[1]+`</span>`;
                                return span;
                            }
```

> [!CAUTION]
> This is not HTML safe, the string will not be sanitize because of function/variable calls.

### PHP Method

```php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Yippy\ToastUiEditorBundle\Form\Type\ToastUiEditorType;

class ExampleController extends AbstractController
{
    public function new(Request $request): Response
    {
        $form = $this->createFormBuilder($task)
            ->add('editorTextExample', ToastUiEditorType::class, [
                'editor' => [
                    'options' => [
                        'widget_rules' => [
                            'rule: /\[(@\S+)\]\((\S+)\)/,
                            toDOM(text) {
                                const rule = /\[(@\S+)\]\((\S+)\)/;
                                const matched = text.match(rule);
                                const span = document.createElement(`span`);
                                span.innerHTML = `<span class="badge badge-primary" href="`+matched[2]+`">`+matched[1]+`</span>`;
                                return span;
                            }'
                        ]
                    ]
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Example'])
            ->getForm();

        // ...
    }
}
```

> [!CAUTION]
> This is not HTML safe, the string will not be sanitize because of function/variable calls.

### Override Template with Popup Widget

![Override Template](./docs/OVERRIDE_TEMPLATE.md)
```js
const popup = document.createElement('ul');
// ...

editor.addWidget(popup, 'top');

editor.on('keyup', (editorType, ev) => {
  if (ev.key === '@') {
    const popup = document.createElement('ul');
    // ...
  
    editor.addWidget(popup, 'top');
  }
})
```


![Toast UI Documentation ](https://github.com/nhn/tui.editor/blob/master/docs/en/widget.md)

![Widget Rule Example](./images/widget_rule_example.gif)
