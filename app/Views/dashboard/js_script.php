<script type="text/javascript">
    //File Upload
    $(function () {
        var fileupload = $("#FileUpload1");
        var filePath = $("#spnFilePath");
        var button = $("#btnFileUpload");
        button.click(function () {
            fileupload.click();
        });
        fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<i class='feather icon-image mr-2'></i>" + fileName);
        });
    });

    //products Characteristics
    $(document).ready(function () {
        var i = 0;
        var nbcontent = 0;
        $('#btn_add').click(function () {
            i++;
            $('#dynamic_field').append('<div class="row" id="row' + i + '"><div class="col-sm-5"><div class="form-group"><input type="text" class="form-control" aria-describedby="emailHelp" name="charact_name[]" required></div></div><div class="col-sm-5"><div class="form-group"> <input type="text"  id="Text" class="form-control" name="charact_value[]" data-role="tagsinput" required></div></div><div class="col-sm-2"> <a href="#!" class="btn btn-icon btn-outline-danger btn_remove"><i class="feather icon-trash"></i></a></div></div>');
            $('#nbcontent').val(i + 1);
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            console.log(i--);
            $('#nbcontent').val(i + 1);
        });
    });
</script>
<?php if (isset($page) && $page == 'production'): ?>
    <script type="text/javascript">
        let productId = document.getElementById('select-product').value
        let colGeneric = document.getElementById('col-generic-qty')
        let soudureDiv = document.getElementById('soudure-row')


        if (productId == ""){
            hideElement()
        }
        if (productId =! "" && productId != 16) {
            hideElement()
        } else {
            showElement()
            document.getElementById('generic_usable_qty').value = '0';
            colGeneric.style.visibility="hidden"
        }

        //Function called on select element
        function checkSelect(request) {
            let option = request.value;
            let labelValue = "Quantité ciment"

            if (option != 16) {
                hideElement()
                colGeneric.style.visibility = "visible";

                switch (option) {
                    case "17":
                        labelValue = "Quantité M3";
                        break;//Agregas
                    case "18":
                        labelValue = "Quantité Litres";
                        break;//Carburant
                    case "15":
                        labelValue = "Quantité Tôles";
                        break;//Chambranles
                    case "7":
                        labelValue = "Quantité Pièces";
                        break;//Claustras
                    default :
                        labelValue = "Quantité ciment";
                }
                document.getElementById('dynamic-label').innerText = labelValue

            } else {
                colGeneric.style.visibility = "hidden"
                showElement()
            }
        }

        function showElement() {
            soudureDiv.style.visibility = "visible"
        }

        function hideElement() {
            document.getElementById('disque_c').value = '0';
            document.getElementById('disque_meller').value = '0';
            document.getElementById('baguette').value = '0';
            //document.getElementById('generic_usable_qty').value = '0';
            soudureDiv.style.visibility = "hidden"
        }
    </script>
<?php endif; ?>
