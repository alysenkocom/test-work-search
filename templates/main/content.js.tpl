<script>

    $('select[name="brand"]').change(function(){
        var brandId = parseInt(this.value);
        if (brandId > 0) {

            $.ajax({
                method: "POST",
                url: '/main/ajax/',
                dataType: "json",
                data: {
                    ajax: true,
                    brandId: brandId
                }
            }).done(function(data) {
                var content = $('select[name="size"]:first-child option')[0].outerHTML;
                if (data.error === false) {
                    $('select[name="size"]').prop( "disabled", false );
                    if (data.result.length > 0) {
                        $.each(data.result, function(key, val){
                            content += '<option value="' + val.id + '">' + val.name + '</option>';
                        });
                        $('select[name="size"]').html(content);
                    }
                } else {
                    $('select[name="size"]').prop( "disabled", true ).html(content);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                $('select[name="size"]').prop( "disabled", true );
            });

        }
    });

</script>