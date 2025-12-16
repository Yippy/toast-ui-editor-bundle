## Override Template

Overriding the default TWIG template can be useful in amending/adding your own javascripts.

### Step 1: Copy the twig template

![Copy Template](./../src/Resources/views/Form/toast_ui_editor_widget.html.twig)

### Step 2: Move it to your Project's override bundle folder
```
- project/
    └─ templates/
        └─ bundles/
            └─ YippyToastUiEditorBundle/
                └─ Form/
                    └─toast_ui_editor_widget.html.twig
```
