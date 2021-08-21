<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <title>Lista de Pessoas</title>
</head>
<body>
    <div class="container mt-5">
    @yield('content')
    </div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.validate.js"></script>
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/additional-methods.js"></script>
    <script src="/js/additional-methods-custom.js"></script>
    <script src="/js/localization/messages_pt_BR.js"></script>
    <script src="/js/jquery.inputmask.min.js"></script>
    <script src="/js/jquery.maskMoney.min.js"></script>
    <script src="/js/select2.min.js"></script>
    @yield('scripts')
</body>
</html>