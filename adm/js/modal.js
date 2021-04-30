/* Janela Modal */
$('#exampleModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipientid = button.data('whatever') // Extract info from data-* attributes
	var recipientnome = button.data('whatevernome')
	var recipientinserido = button.data('whateverinserido')
	var recipientalterado = button.data('whateveralterado')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('#titulo-nome-categoria').text(recipientnome)
	modal.find('#id-categoria').text(recipientid)
	modal.find('#nome-categoria').text(recipientnome)
	modal.find('#inserido-categoria').text(recipientinserido)
	modal.find('#alterado-categoria').text(recipientalterado)
})

$('#editar').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipientid = button.data('whatever') // Extract info from data-* attributes
	var recipientnome = button.data('whatevernome')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('#titulo-nome-categoria').text(recipientnome)
	modal.find('#id-categoria').val(recipientid)
	modal.find('#nome-categoria').val(recipientnome)
})


