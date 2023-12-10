var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // negrito, itálico, sublinhado, tachado
            ['link', 'image'],                                // link e imagem
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],        // tamanhos de cabeçalho
            [{ 'color': [] }, { 'background': [] }],          // cores de texto e de fundo
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],    // listas ordenadas e não ordenadas
            [{ 'align': [] }],                                // alinhamento de texto
            ['clean']            
        ],
        
    }
});

// Adicionando um ouvinte para atualizar o campo de texto escondido
quill.on('text-change', function() {
    document.getElementById('texto').value = quill.root.innerHTML;
    console.log('atualizado');
});