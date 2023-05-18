<?php

?>

<title>
    Paga Vise | Dashboard personale
</title>

<main class="d-flex align-items-end mt-5">
    <div class="container mt-5">
        <div class="row g-2">
            <div class="col-lg-4 ">
                <div class="container ">
                    <!-- Row saldo vise -->
                    <div class="row shadow-lg rounded-3 bg-white mb-4 pt-2">
                        <span class="text-start text-primary fw-bold">Saldo Vise</span>
                        <hr class="m-0">
                        <div class="fw-bold my-3 mx-2">
                            <span class="fs-1">€
                                <?php
                                if (isset($_SESSION['username'])) {
                                    $url = $_apiURI . '/src/API/API/user_account/getBalance.php?username=' . $_SESSION['username'];
                                
                                    $response = sendHttpRequest($url, 'GET')['response'];
                                    $json = json_decode($response);

                                    if (isset($json->balance)) {
                                        echo $json->balance;
                                    } else {
                                        echo 'Err: no bal';
                                    }
                                } else {
                                    echo 'Err: no user';
                                }

                                ?>
                            </span>
                            <span class="ms-3 fs-6">disponibili</span>
                        </div>
                    </div>

                    <!-- Row bottoni denaro -->
                    <div class="row my-2 text-center">
                        <div class="col-6 px-4">
                            <a class="btn btn btn-outline-primary rounded-3 w-100" href="?page=moneySending">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-currency-euro mb-1" viewBox="0 0 16 16">
                                    <path
                                        d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />
                                </svg>
                                <div class="sm-0">Invia denaro</div>

                            </a>
                        </div>
                        <div class="col-6 px-4">
                            <button class="btn btn btn-outline-secondary rounded-3 w-100" data-bs-toggle="tooltip"
                                data-bs-title="Temporaneamente non disponibile...">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-cash mb-1" viewBox="0 0 16 16">
                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    <path
                                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                </svg>
                                <div class="m-0">Richiedi denaro</div>
                            </button>
                        </div>
                    </div>

                    <!-- Row gestione carte -->
                    <div class="row text-center shadow-lg rounded-3 bg-white mt-4 pt-2">
                        <span class="text-start text-primary fw-bold">Le mie carte</span>
                        <hr class="m-0">
                        <span class="d-flex align-items-center my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2 opacity-50"
                                style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-credit-card-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                            </svg>
                            <label style="font-size: 12px" class="name_label mb-2" id="label" class="form-check-label"
                                for="exampleCard">
                                Postepay Evolution Connect (**** **** **** 1234)
                            </label>
                        </span>
                        <span class="d-flex align-items-center my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2 opacity-50"" style=" width: 25px;
                                height: 25px;" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                            <label style="font-size: 12px" class="name_label mb-2" id="label" class="form-check-label"
                                for="googlePay">
                                Google Pay
                            </label>
                        </span>
                        <div class="row my-2">
                            <div class="col-6">
                                <button class="btn btn-outline-secondary btn-sm rounded-pill">
                                    Aggiungi una carta

                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-secondary btn-sm rounded-pill">
                                    Gestisci le tue carte

                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 ">
                <div class="container" style="min-height: 81vh;">
                    <div class="row shadow-lg rounded-3 bg-white">
                        <span class="text-start text-primary fw-bold pt-2">Attività recenti</span>
                        <hr>

                        <table id="recent-activities-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Ricevente</th>
                                    <th>Destinatario</th>
                                    <th>Data</th>
                                    <th>Importo (€)</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            showRecentActivities();
        });

        function showRecentActivities() {
            getActivities(function (activityArray) {
                $('#recent-activities-table').DataTable({
                    rowReorder: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/it-IT.json',
                    },
                    data: activityArray,
                    columns: [
                        { data: "sender_user_id" },
                        { data: "receiver_user_id" },
                        { data: "payment_date_time" },
                        { data: "amount" }
                    ]
                });
            });
        }

        function getActivities(_callback) {
            $.ajax({
                url: "<?php echo 'http://' . $_apiURI . '/src/API/API/Payment/getArchivePaymentByUsername.php?username=' . $_SESSION['username']?>",
                type: "GET",
                success: function (result) {
                    _callback(result);
                },
                error: function (xhr, textError, errorStatus) {
                    alert(errorStatus);
                },
            });
        }
    </script>
</main>