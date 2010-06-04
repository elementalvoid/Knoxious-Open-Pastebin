/*
 *	PZTMe Appliance  »  Version 0.1		ALPHA!!! Not fully functioning!!!
 *	===============================
 *
 *	Written by Xan Manning,  2010
 *	Released under the Creative Commons Attribution-Share-Alike 2.0 License
 *	http://creativecommons.org/licenses/by-sa/2.0/uk/
 *
 *
 *	Description
 *	----------------------------
 *
 *	Connects and configures itself to the PZT.me API so you can put your own
 *	pastebin on your site.
 */



/*
 * CONFIGURATION
 */

var _pztMeOptions = ({
	defaults: "http://pzt.me/defaults",				// Location of defaults page
	adaptor: false,							// Override given adaptor (path or false)
	method: "GET",							// Method for sending data, note "POST" only works if adaptor is on the same domain
	pb_name: false,							// Override pastebin name (string or false)
	pb_author: false,						// Override default author (string or false)
	display_local: true,						// Display pastes locally (true or false)
	display_title: true,						// Displays title of pastebin (true or false)
	image_max_width: 600,						// Maximum width of images
	image_max_height: 400,						// Maximum height of images

	/* Answer the following true or false */

	disable_editing: false,						// Disable editing (if enabled)
	disable_syntax: false,						// Disable Syntax Highlighting (if enabled)
	disable_privacy: false,						// Disable Privacy controls (if enabled)
	disable_lifespan: false						// Disable lifespan controls and revert to default (if enabled)

});

(function($){

/*
 * THE MAIN FUNCTION
 */

var $$;
var hashtag = window.location.hash.substring(1);
var _extOpt;
var _pb_title;
var _pb_form;
var _pb_form_container;
var _pb_form_secondary_container;
var _paste_parent;
var actionTarget;
var getPasteTarget;

$.fn.pztMeApp = function() {
	return this.each(function () {
		$$ = $(this);
		$.getJSON(_pztMeOptions.defaults + '@callback=?', function(data) {
			_extOpt = data;

			if(_pztMeOptions.pb_name != false)
				_extOpt.name = _pztMeOptions.pb_name;
		
			if(_pztMeOptions.display_title == true)
				_pb_title = $$.append('<h1 class="_pb_title">' + _extOpt.name + '</h1>');

			_pb_form = $('<form id="pasteForm" class="_pb_paste_form"></form>');

			if(_extOpt.api_adaptor != 0 && _pztMeOptions.adaptor == false)
				actionTarget = _extOpt.api_adaptor;
			else if(_pztMeOptions.adaptor != false)
				actionTarget = _pztMeOptions.adaptor;
			else
				actionTarget = _extOpt.api;

			if(actionTarget == _extOpt.api)
				getPasteTarget = actionTarget + '@';
			else
				getPasteTarget = actionTarget + '?callback=?&hashtag='

			_pb_form.attr('method', 'get').attr('action', actionTarget).attr('enctype', 'multipart/form-data');

			var _pb_form_label_pasteEnter = null;
			var _pb_form_label_author = null;
			var _pb_form_contentType_pasteEnter = null;
			var _pb_form_highlightStr = null;

			if(hashtag != '') {
				_paste_parent = '<input type="hidden" name="parent" id="parent" value="' + hashtag + '" />';
				var _loaded_paste = _loadPaste(getPasteTarget + hashtag, hashtag);
			} else {
				_paste_parent = '';
			}


			if(_extOpt.url_redirection != 0)
				_pb_form_contentType_pasteEnter = "text/url";
			else
				_pb_form_contentType_pasteEnter = "text";

			if(_extOpt.line_highlight != 0)
				_pb_form_highlightStr = "To highlight lines, prefix them with <em>" + _extOpt.line_highlight + "</em>";

			if(_pztMeOptions.pb_author != false)
				var _pb_author = _pztMeOptions.pb_author;
			else
				var _pb_author = _extOpt.author;
			
			_pb_form_label_pasteEnter = $('<label for="pasteEnter">Paste your ' + _pb_form_contentType_pasteEnter + ' here! ' + _pb_form_highlightStr + '</label><br />');
			_pb_form_label_author = '<label for="authorEnter">Your name</label><br />';

			$$.append('<div id="_pb_result" style="display: none;"></div>');

			if(hashtag == '' || (hashtag != '' && _pztMeOptions.disable_editing == false && _extOpt.editing == 1)) {
				_pb_form.append(_pb_form_label_pasteEnter);
				_pb_form.append('<textarea name="pasteEnter" id="pasteEnter" class="_pb_paste_enter"></textarea>');
				_pb_form.append('<div id="secondaryFormContainer" class="_pb_secondary_form_container"></div>');

				_pb_form_secondary_container = _pb_form.children('div#secondaryFormContainer');
				
				if(_pztMeOptions.disable_syntax == false && _extOpt.syntax == 1)
					_pb_form_secondary_container.append('<div id="highlightContainer"><label for="highlighter">Syntax Highlighting</label><br /><select name="highlighter" id="highlighter"> <option value="plaintext" selected="selected">None</option> <option value="bash">Bash</option> <option value="c">C</option> <option value="cpp">C++</option> <option value="css">CSS</option> <option value="html4strict">HTML</option> <option value="java">Java</option> <option value="javascript">Javascript</option> <option value="jquery">jQuery</option> <option value="latex">LaTeX</option> <option value="mirc">mIRC Scripting</option> <option value="perl">Perl</option> <option value="php">PHP</option> <option value="python">Python</option> <option value="rails">Rails</option> <option value="ruby">Ruby</option> <option value="sql">SQL</option> <option value="xml">XML</option></select></div>');

				if(_pztMeOptions.disable_lifespan == false && _extOpt.lifespan != 0) {
					var i = 0;
					var spans = null;
					for (i=0;i<=25;i++)
						{
							if(_extOpt.lifespan[i] != null)
								spans = spans + '<option value="' + i + '">' + _extOpt.lifespan[i] + '</option>';
						}

					_pb_form_secondary_container.append('<div id="lifespanContainer"><label for="lifespan">Paste Expiration</label><br /><select name="lifespan" id="lifespan">' + spans + '</select></div>');
				}

				if(_pztMeOptions.disable_privacy == false && _extOpt.privacy != 0) {
					_pb_form_secondary_container.append('<div id="privacyContainer"><label for="privacy">Paste Visibility</label><br /><select name="privacy" id="privacy"><option value="0">Public</option> <option value="1">Private</option></select></div>');
				}

				_pb_form_secondary_container.append('<div id="authorContainer">' + _pb_form_label_author + '<input type="text" name="author" id="authorEnter" value="' + _pb_author + '" onfocus="if(this.value==\'' + _pb_author + '\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'' + _pb_author + '\';" maxlength="32" /></div>');

				_pb_form_secondary_container.append('<input type="text" name="email" id="poison" style="display: none;" />' + _paste_parent + '<div id="submitContainer" class="submitContainer"><input type="submit" name="submit" id="_pb_submit_button" value="Submit your paste" /></div> ');
			}

			_pb_form_container = _pb_form.wrap('<div>').parent();
			_pb_form_container.attr('id', 'pasteFormContainer').addClass('_pb_paste_form_container');

			$$.append(_pb_form_container);

			var appDataType = "jsonp";
			if(_pztMeOptions.method != "GET" || (_pztMeOptions.api_adaptor == 0 && _pztMeOptions.method == "GET"))
				appDataType = "json";

			_pb_form.submit(function () {
				$('#_pb_submit_button').attr('value', 'Posting, Please wait...');
				$('#_pb_submit_button').attr('disabled', 'disabled');
				$.ajax({
					url: actionTarget,
					type: _pztMeOptions.method,
					data: $('#pasteForm').serialize(),
					dataType: appDataType, 
					success: function(data) {
						if(data.error != 0) {
							var responseStr = data.message;
							var responseClass = "error";
							$('#_pb_submit_button').attr('value', 'Submit your paste');
							$('#_pb_submit_button').removeAttr('disabled');
						} else {
							if(_pztMeOptions.display_local == true)
								var responseURL = String(window.location).replace('#' + hashtag, '') + "#" + data.id;
							else
								var responseURL = data.url;

							var responseStr = "URL to your paste is <a href=\"" + responseURL + "\" rel=\"_pasteLinkID\">" + responseURL + "</a>";
							var responseClass = "success";
							_pb_form.slideUp();
						}

						$('div#_pb_result').removeAttr('class').addClass(responseClass).html(responseStr).fadeIn('slow');
					}
				});

				$('div#_pb_result').fadeIn('slow');
				return false;
			});

			function _loadPaste(_hashtag, hashtag) {
				$.getJSON(_hashtag, function(retr) {

					if(retr.geshi != '') {
						var retrPaste = decodeURIComponent(retr.geshi.replace(/\+/g, '%20')).replace(/\\(.?)/g, '');
						_paste_orig = decodeURIComponent(retr.data.replace(/\+/g, '%20')).replace(/\\(.?)/g, '') + '';
						var retrStyle = '<style type="text/css">' + decodeURIComponent(retr.style.replace(/\+/g, '%20')).replace(/\\(.?)/g, '') + '</style>';
					} else {
						var retrPaste = '<code><pre>' + decodeURIComponent(retr.data.replace(/\+/g, '%20')).replace(/\\(.?)/g, '') + '</pre></code>';
						_paste_orig = decodeURIComponent(retr.data.replace(/\+/g, '%20')).replace(/\\(.?)/g, '') + '';
						var retrStyle = '';
					}

					if(retr.image != '') {
						var retrImage = '<div><a href="' + retr.image + '" rel="external"><img src="' + retr.image + '" alt="' + retr.image_text + '" style="border: none; max-height: ' + _pztMeOptions.image_max_height + 'px; width: auto; max-width: ' + _pztMeOptions.image_max_width + 'px; height: auto;" /></a></div><div><input type="text" name="_imgpath" id="_imgpath" value="' + retr.image + '" /></div>';
					} else
						var retrImage = '';

					if(retr.video != '') {
						var retrVideo = retr.video;
					} else
						var retrVideo = '';

					if(retr.parent != 0)
						var retrParent = '<div><strong>Parent</strong>: ' + retr.parent + '</div>';
					else
						var retrParent = '';

					_pb_form.before('<div><strong>PasteID:</strong> ' + hashtag + '</div><div><strong>Written by</strong>: ' + retr.author + '</div>' + retrParent + retrVideo + retrImage + retrStyle + '<div>' + retrPaste + '</div>');
					$('textarea#pasteEnter').html(_paste_orig);
				});
			}
		
		});

	});

	$('a[rel="_pasteLinkID"]').click(function() {
		alert("FUCKIT");
		return false;
	});


}

})(jQuery);
