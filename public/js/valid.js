function valid(form)
{
    var sendForm = true;
    var elements = form.elements;
    for (var i = 0; i < elements.length; i++) {
	var atribute = elements[i].getAttribute('data-not-empty');
	if (atribute !== null) {
	    var elemValue = elements[i].value.replace(/^\s*(.*)\s*$/, '$1');

	    if (elemValue.length === 0) {		
		elements[i].style.border = '1px solid red';
		sendForm = false;
	    }
	}
    }
    
    return sendForm;
}