<!DOCTYPE html>
<html lang="en" dir="ltr">

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
  <title>Login | Si Panda</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>

<body class="DEFAULT_THEME ">
  <main>
    <!-- Main Content -->
    <div class="flex flex-col w-full overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">

      <div class="justify-center items-center w-full card lg:flex max-w-md ">
        <div class=" w-full card-body">
          <a href="../" class="block"><img width="175" src="<?= base_url('assets/images/logos/logo-SiPanda-nobg.png') ?>" alt="logo Si Panda" class="mx-auto"/></a>
          <?php if (session('error')) : ?>
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
              <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
              </svg>
              <span class="sr-only">Info</span>
              <div><?= session('error') ?></div>
            </div>
          <?php endif ?>
          <!-- form -->
          <form method="post" action="<?= base_url('/login') ?>">
            <!-- username -->
            <div class="mb-4">
              <label for="email"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
              <input type="text" id="email" name="email" value="<?= old('email') ?>" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-describedby="hs-input-helper-text">
            </div>
            <!-- password -->
            <div class="mb-6">
              <label for="password"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
              <input type="password" id="password" name="password" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-describedby="hs-input-helper-text">
            </div>
            <!-- checkbox -->
            <!-- button -->
            <div class="flex my-6">
              <button type="submit" class="btn w-full py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</button>
            </div>
        </div>
        </form>
      </div>
    </div>

    </div>
    <!--end of project-->
  </main>

  <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>

</body>

</html>