<script>
    Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#my-dropzone",{
            url: "<?= site_url("adm_berita/upload"); ?>",
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            removefile: function(file){
                var name = file.name;
                $.ajax({
                    type: "post",
                    url: "<?= site_url("adm_berita/remove"); ?>",
                    data: {file: name},
                    dataType: 'html'
                });
                var previewElement;
                return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
            },
            success: function( file, response ){
                   var filename=myDropzone.files[0].name;
                   $('#foto').val(filename);
            },
        });
</script>