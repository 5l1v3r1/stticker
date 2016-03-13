/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,undo,wsc,autolink,autoembed,autogrow,glyphicons,lineutils,widget,btgrid,chart,bt_table,widgetcommon,easykeymap,filetools,youtube,ckeditor-gwf-plugin,gg,imagerotate,imageresize,lightbox,qrc';
	config.skin = 'flat';
    config.filebrowserBrowseUrl = '/backend/assets/js/plugins/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = '/backend/assets/js/plugins/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = '/backend/assets/js/plugins/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = '/backend/assets/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = '/backend/assets/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = '/backend/assets/js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
