<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/logo-SiPanda.jpg') ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
    <script>
        const toLocalDate = (date, options = {
                day: "numeric",
                month: "long",
                year: "numeric"
            }) => {
            let indDate = new Date(date.innerText);

            indDate = indDate.toLocaleDateString("id-ID", options);

            date.innerText = indDate;
        }
    </script>
    <title><?= $title ?> | Si Panda</title>
</head>

<body class="bg-surface">