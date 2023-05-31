/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';
function ConfirmDialog(message) {
    var def = $.Deferred();
    var result = false;
    $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '?</h6></div>')
        .dialog({
            modal: true,
            title: 'Onaylamak',
            zIndex: 10000,
            autoOpen: true,
            width: 'auto',
            resizable: false,
            buttons: {
                Evet: function() {
                    result = true;

                    $(this).dialog("close");
                },
                Hayır: function() {
                    result = false;

                    $(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $(this).remove();
                if(result)
                    def.resolve();
                else def.reject();
            }
        });
    // create and/or show the dialog box here
    // but in "OK" do 'def.resolve()'
    // and in "cancel" do 'def.reject()'

    return def.promise();

}
function InfoDialog(message) {

    $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '?</h6></div>')
        .dialog({
            modal: true,
            title: 'Bilgi',
            zIndex: 10000,
            autoOpen: true,
            width: 'auto',
            resizable: false,
            buttons: {
                Tamam: function() {
                    $(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $(this).remove();
            }
        });
}
