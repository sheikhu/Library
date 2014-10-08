$(function () {
    $('.collectionnable').each(function(){

        var collectionContainer = $(this).find('.collectionContainer');
        var $addTagBtn= $(this).find('.btn-add');
        $addTagBtn.on('click', function(e) {
            // empêche le lien de créer un « # » dans l'URL
            e.preventDefault();

            var row_count = collectionContainer.find('.row-collection').length;
            // alert(row_count);
            if($(collectionContainer).attr('data-max-row') != false && $(collectionContainer).attr('data-max-row') != 'undefined')
            {
                if( row_count >= $(collectionContainer).attr('data-max-row') )
                    return;
            }

            console.log(collectionContainer);
            // ajoute un nouveau formulaire tag (voir le prochain bloc de code)
            addTagForm(collectionContainer);
        });

        if($(collectionContainer).find('.row-collection').length == 0 && $(collectionContainer).attr('data-autoadd') == 'true')
            addTagForm(collectionContainer);
    });




    $(document).on('click','a.drop-row', function(e){
        e.preventDefault();

        var $this = $(this);    // Drop row element [a]


        if (confirm("Etes vous sur de vouloir supprimer cet element ?")) {

            var $current_row = $this.parents('tr, .row-collection, .well');
            var current_id = $current_row.data('id');


                var status = true;
                if(current_id){
                    var $container = $this.parents('.container');
                    console.log($container);
                    var url = $current_row.data('delete-url');
                    if(url)
                        dropElement(url, {'id': current_id}, $current_row);
                } else {
                    $current_row.fadeOut('normal', function(){
                        $(this).remove();
                    });
                }


        }
    });

});
function addTagForm(collectionHolder) {
    // Récupère l'élément ayant l'attribut data-prototype comme expliqué plus tôt
    var prototype = collectionHolder.attr('data-prototype');
    // Remplace '__name__' dans le HTML du prototype par un nombre basé sur
    // la longueur de la collection courante
    var newForm = prototype.replace(/__name__/g, collectionHolder.find('.row-collection').length);
    // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"

    collectionHolder.append($(newForm).addClass('row-collection').fadeIn('normal', function(){
        //$(this).find('select.mws-select2').select2();
    }));

}


function dropElement(url, options, $element){
    console.log('drop-element with id [' + options.id + '] on '+ url);
    var params = {
        'id': options.id,
        'form[token]' : $('[name*="token"]').val(),
        '_method' : 'DELETE'
    };


    $.post(url, params, function(data){
        console.log(data);

        console.log('Cool !#' +status );
        $element.fadeOut('normal', function(){
            $(this).remove();
        });
    }).fail(function(error){
        console.log('Erreur : ' + error);
        bootbox.alert('Une erreur est survenue. [ ' + error.statusText+ ' ]' );
    });

}
