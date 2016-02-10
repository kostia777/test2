$(document).ready(function(){

	var show_text     = 'Предпросмотр';
	var hide_text     = 'Режим редактирования';
	var textarea = $('textarea[name="comment"]');

	var comment = '';

	$(textarea).wrap('<div id="jquery-comment-wrap"></div>');
	$(textarea).before('<div id="jquery-comment-preview"></div>');
	$('#jquery-comment-preview').prepend('<div id="preview-tab"><div><a>'+ show_text +'</a></div></div>');

	$('#jquery-comment-wrap, #jquery-comment-preview').width($(textarea).width());

	$('#preview-tab div').toggle(
		function() {
			comment = $(textarea).val();
			comment_preview = comment.replace(/\n/g, '<br />');
			
			var author = $('#author').val(); // значение параметра "value" поля  Имя автора
			var tema = $('#tema').val();      // значение параметра "value" поля ТЕМА 
			var email = $('#email').val();  // значение параметра "value" поля Email
			
//Получаем дату			
var now = new Date();
			
	

	


var preview_html = '<div><address><strong> ' + author +' </strong><br><a href="mailto:#">' + email + '</a><br>Тема:'  +  tema +   '<br><blockquote><p>' + comment_preview +'</p> <footer>Время написания коментария <cite title="Source Title">'+ now +'</cite></footer></blockquote></address></div>';









			$(textarea).after('<div id="textarea_clone"></div>');
			$(textarea).clone().prependTo($('#textarea_clone'));
			$('#textarea_clone textarea').text(comment);
			$('#textarea_clone').hide();
			$(textarea).replaceWith('<div id="comment_preview"></div>');
			$('#comment_preview').html(preview_html);
			$('#preview-tab a').text(hide_text); // меняем текст блока отвечающего за переход в режим предпросмотра на "Режим редактирования"
		},
		function() {
			$('#textarea_clone').remove();
			$('#comment_preview').replaceWith(textarea);
			$(textarea).text(comment);
			$('#preview-tab a').text(show_text); // меняем текст блока отвечающего за переход в режим предпросмотра на "Предпросмотр"
		}
	)

})