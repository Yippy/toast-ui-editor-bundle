# YippyToastUiEditorBundle

[![MIT license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/Yippy/toast-ui-editor-bundle/blob/main/LICENSE) [![Latest Stable Version](https://img.shields.io/packagist/v/yippy/toast-ui-editor-bundle.svg)](https://packagist.org/packages/yippy/toast-ui-editor-bundle) [![Total Downloads](https://img.shields.io/packagist/dt/yippy/toast-ui-editor-bundle.svg)](https://packagist.org/packages/yippy/toast-ui-editor-bundle) [![Donate](https://img.shields.io/badge/-Buy%20Me%20a%20Coffee-ff5f5f?logo=ko-fi&logoColor=white)](https://www.buymeacoffee.com/yippy)

This bundle integration TOAST UI Editor for your symfony project. The code for this bundle was forked from [teebbstudios\TeebbTuiEditorBundle](https://github.com/teebbstudios/TeebbTuiEditorBundle), which was inspired by [FriendsOfSymfony\FOSCKEditorBundle](https://github.com/FriendsOfSymfony/FOSCKEditorBundle).

TOAST UI Editor is a WYSIWYG and Markdown Editor that follows [CommonMark](https://commonmark.org/) and [GFM](https://github.github.com/gfm/) specifications.

![tui.editor](https://user-images.githubusercontent.com/1215767/34356204-4c03be8a-ea7f-11e7-9aa9-0d84f9e912ec.gif)

Installation ＆ Usage
============

Applications that use Symfony Flex
----------------------------------

Open a command console, enter your project directory and execute:

```console
$ composer require yippy/toast-ui-editor-bundle
```

Applications that don't use Symfony Flex
----------------------------------------

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

```console
$ composer require yippy/toast-ui-editor-bundle
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

### Step 2: Enable the Bundle

Then ensuring the bundle is listed as one of registered bundles in the `config/bundles.php` file of your project:

```php
<?php

return [
    // ...
    new Yippy\ToastUiEditorBundle\YippyToastUiEditorBundle(),
];
```

### Step 3: Load assets files into public bundles folder

Running this command will reference the Toast UI Editor js and css assets files into `/public/bundles/yippytoastuieditor`, if 

```console
$ php bin/console assets:install --symlink
```

### Step 4: Config the Bundle

You can add a config file in `config/packages` folder.（Just a simple config, But you can use the following configuration completely）:
```yaml
#config/packages/toast_ui_editor.yaml
yippy_toast_ui_editor:
    #enable: true                                           # Whether to enable tui.editor.
    #jquery:
        #enable: false                                      # Whether to enable jquery.
        #js_paths:                                          # Custom jquery path.
            #- /bundles/yippytoastuieditor/js/jquery.min.js
    # ...                                                   # more config options, you can see: bin/console debug:config yippy_toast_ui_editor 

    #editor:
        #js_paths:
            #- /bundles/yippytoastuieditor/js/toast-ui-editor-bundle.js
        #css_paths:
            #- /bundles/yippytoastuieditor/css/toastui-editor.css
        #options:
            #height: 'auto'                                 # Editor's height style value. Height is applied as border-box ex) '300px', '100%', 'auto'
            #initial_edit_type: 'wysiwyg'                   # Initial editor type (markdown, wysiwyg)
            #preview_style: 'vertical'                      # Markdown editor's preview style (tab, vertical)
            #theme: 'dark'                                  # override editor color scheme with dark theme
            #toolbar_items:
                #- ['heading', 'bold', 'italic', 'strike']
                #- ['hr', 'quote']
                #- ['ul', 'ol', 'task', 'indent', 'outdent']
                #- ['table', 'image', 'link']
                #- ['code', 'codeblock']
            #widget_rules:
                #- |
                    #rule: /\[(@\S+)\]\((\S+)\)/,
                    #toDOM(text) {
                        #const rule = /\[(@\S+)\]\((\S+)\)/;
                        #const matched = text.match(rule);
                        #const span = document.createElement('span');
                        #span.innerHTML = `<span class="badge badge-primary" href="`+matched[2]+`">`+matched[1]+`</span>`;
                        #return span;
                    #}
    #viewer:
        #js_paths:
            #- /bundles/yippytoastuieditor/js/toast-ui-viewer-bundle.js
        #css_paths:
            #- /bundles/yippytoastuieditor/css/toastui-editor-viewer.css
        #options:
            #height: 'auto'                                 # Viewer's height style value. Height is applied as border-box ex) '300px', '100%', 'auto'
    #extensions:                                            # extensions must defined as array of plugin_name variable or [plugin_name, [plugin_options]]
        #chart:                                             # chart custom options
            #js_paths:
                #- /bundles/yippytoastuieditor/js/toast-ui-chart-bundle.js
            #css_paths:
                #- /bundles/yippytoastuieditor/css/toastui-chart.min.css
            #options:
                #width: 'auto'                              # number|string	'auto'	Default width value
                #height: 'auto'                             # number|string	'auto'	Default height value
                #minWidth: 0                                # number	0	Minimum width value
                #maxWidth: 0                                # number	0	Minimum height value
                #minHeight: Infinity                        # number    Infinity	Maximum width value
                #maxHeight: Infinity                        # number	Infinity	Maximum height value
        #codeSyntaxHighlight:
            #js_paths:
                #- /bundles/yippytoastuieditor/js/toast-ui-code-syntax-highlight-bundle.js
            #css_paths:
                #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-code-syntax-highlight.css
        #colorSyntax:                                       # colorSyntax custom options
            #js_paths:
                #- /bundles/yippytoastuieditor/js/toast-ui-color-syntax-bundle.js
            #css_paths:
                #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-color-syntax.css
                #- /bundles/yippytoastuieditor/css/tui-color-picker.css
            #options:
                #preset: ['#181818', '#292929']         # [required] preset	Array.<string>		Preset for color palette
        #tableMergedCell:
            #js_paths:
                #- /bundles/yippytoastuieditor/js/toast-ui-table-merged-cell-bundle.js
            #css_paths:
                #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-table-merged-cell.css
        #uml:                                               # uml custom options
            #js_paths:
                #- /bundles/yippytoastuieditor/js/toast-ui-uml-bundle.js
            #options:
                #rendererURL: ~                             # [required]string	'http://www.plantuml.com/plantuml/png/'	URL of plant uml renderer
    #dependencies:                                          # You may add any dependancy that you need here
        #editor_dark_theme:
            #css_paths:
                #- /bundles/yippytoastuieditor/css/toastui-editor-dark.css

    default_config: basic_config
    configs:
        basic_config:
            #to_html: false                                  # Save to database use html syntax?
            #editor:
                #js_paths:
                    #- /bundles/yippytoastuieditor/js/toast-ui-editor-bundle.js
                #css_paths:
                    #- /bundles/yippytoastuieditor/css/toastui-editor.css
                #options:
                    #height: 'auto'                             # Editor's height style value. Height is applied as border-box ex) '300px', '100%', 'auto'
                    #initial_edit_type: 'wysiwyg'               # Initial editor type (markdown, wysiwyg)
                    #preview_style: 'vertical'                  # Markdown editor's preview style (tab, vertical)
                    #theme: 'dark'                              # override editor color scheme with dark theme
                    #toolbar_items:
                        #- ['heading', 'bold', 'italic', 'strike']
                        #- ['hr', 'quote']
                        #- ['ul', 'ol', 'task', 'indent', 'outdent']
                        #- ['table', 'image', 'link']
                        #- ['code', 'codeblock']
                    #widget_rules:
                        #- |
                            #rule: /\[(@\S+)\]\((\S+)\)/,
                            #toDOM(text) {
                                #const rule = /\[(@\S+)\]\((\S+)\)/;
                                #const matched = text.match(rule);
                                #const span = document.createElement(`span`);
                                #span.innerHTML = `<span class="badge badge-primary" href="`+matched[2]+`">`+matched[1]+`</span>`;
                                #return span;
                            #}
            #viewer:
                #js_paths:
                    #- /bundles/yippytoastuieditor/js/toast-ui-viewer-bundle.js
                #css_paths:
                    #- /bundles/yippytoastuieditor/css/toastui-editor-viewer.css
                #options:
                    #height: 'auto'                             # Viewer's height style value. Height is applied as border-box ex) '300px', '100%', 'auto'
            extensions:                                            # extensions must defined as array of plugin_name variable or [plugin_name, [plugin_options]]
                chart:                                             # chart custom options
                    #js_paths:
                        #- /bundles/yippytoastuieditor/js/toast-ui-chart-bundle.js
                    #css_paths:
                        #- /bundles/yippytoastuieditor/css/toastui-chart.min.css
                    #options:
                        #width: 'auto'                              # number|string	'auto'	Default width value
                        #height: 'auto'                             # number|string	'auto'	Default height value
                        #minWidth: 0                                # number	0	Minimum width value
                        #maxWidth: 0                                # number	0	Minimum height value
                        #minHeight: Infinity                        # number    Infinity	Maximum width value
                        #maxHeight: Infinity                        # number	Infinity	Maximum height value
                codeSyntaxHighlight:
                    #js_paths:
                        #- /bundles/yippytoastuieditor/js/toast-ui-code-syntax-highlight-bundle.js
                    #css_paths:
                        #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-code-syntax-highlight.css
                colorSyntax:                                       # colorSyntax custom options
                    #js_paths:
                        #- /bundles/yippytoastuieditor/js/toast-ui-color-syntax-bundle.js
                    #css_paths:
                        #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-color-syntax.css
                        #- /bundles/yippytoastuieditor/css/tui-color-picker.css
                    #options:
                        #preset: ['#181818', '#292929']         # [required] preset	Array.<string>		Preset for color palette
                tableMergedCell:
                    #js_paths:
                        #- /bundles/yippytoastuieditor/js/toast-ui-table-merged-cell-bundle.js
                    #css_paths:
                        #- /bundles/yippytoastuieditor/css/toastui-editor-plugin-table-merged-cell.css
                uml:                                               # uml custom options
                    #js_paths:
                        #- /bundles/yippytoastuieditor/js/toast-ui-uml-bundle.js
                    #options:
                        #rendererURL: ~                             # [required]string	'http://www.plantuml.com/plantuml/png/'	URL of plant uml renderer
            #dependencies:                                          # You may add any dependancy that you need here
                #editor_dark_theme:                                 # Must include if using 'dark' theme
                    #css_paths:
                        #- /bundles/yippytoastuieditor/css/toastui-editor-dark.css


```

You can config Toast UI Editor language. 
```yaml
#config/services.yaml

parameters:
    locale: 'zh_CN'                   # Change the locale

```

### Step 5: Use the Bundle

Add the Toast UI Editor dependencies in your page top. For example:

```twig
{{ toast_ui_editor_dependencies() }}
```

This will add the Toast UI Editor dependencies JS and CSS libs like:

```html
<link rel="stylesheet" href="/bundles/yippytoastuieditor/css/toastui-editor-dark.css">
```

Second, use the `TuiEditorType` in your form field:

```php
use Yippy\ToastUiEditorBundle\Form\Type\ToastUiEditorType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('body', ToastUiEditorType::class)
        ;
    }

    // ...
} 
```

### Step 6: Render Markdown syntax content

If you were saved markdown syntax in the database. Then you can use the twig function `toast_ui_editor_widget_viewer` to render the markdown syntax content. 
The first parameter id:  div DOM id.
The second parameter content: twig variable, the markdown syntax content.

Tips: Don't forget render the dependencies in the page top！

```twig
<div id="id"></div>
{{ toast_ui_editor_widget_viewer("id", content) }}
```

You can also amend configuration

```twig
<div id="id"></div>
{{ toast_ui_editor_widget_viewer("id", content, { "viewer": {"js_paths": []} }) }}
```

### Step 7: Done!
Yeah! Good Job! The Toast UI Editor will use in your page. Now you can use your inspiration to create.

### How to Use

[Creating Widget Rules](docs/WIDGET_RULES.md)