NovaEditorJs.booting(function (editorConfig, fieldConfig) {
    if (fieldConfig.toolSettings.hyperlink.activated === true) {
        editorConfig.tools.hyperlink = {
            class: require("editorjs-hyperlink"),
            config: {},
        };
    }
});
