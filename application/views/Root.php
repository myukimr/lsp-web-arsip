<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <style>
        .img-cover-adjust {
            height: 20rem;
            width: 15rem;
            object-fit: cover;
            object-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="row container-fluid" style="height:100vh;">
        <div class="col-md-3 p-3 container-fluid bg-light" style="height:100%">
            <h3><center>Menu</center></h3>
            <hr>
            <div class="list-group">
                <a href="<?= base_url('/') ?>" class="list-group-item list-group-item-action <?= $this->uri->segment(1) != 'profil' ? 'active' : 'no' ?>" aria-current="true">
                    Arsip
                </a>
                <a href="<?= base_url('profil') ?>" class="list-group-item list-group-item-action  <?= $this->uri->segment(1) == 'profil' ? 'active' : 'no' ?>">About</a>
            </div>
        </div>
        <div class="col-md container" style="height:100%">
            <?= $content ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "order": [
                    [3, 'dsc']
                ],
                "language": {
                    "search": "Cari Surat: ",
                    "searchPlaceholder": "Cari surat",
                    "zeroRecords": "Data arsip tidak ditemukan."
                },
                "initComplete": () => {
                    $('.dataTables_filter input[type="search"]').css({
                        'width': '350px',
                        'display': 'inline-block'
                    });
                }
            });
        });

        const deleteModal = (id_arsip) => {
            document.getElementById('idarsipdelete').value = id_arsip;
            $("#deletemodal").modal('show');
        }
    </script>
</body>

</html>