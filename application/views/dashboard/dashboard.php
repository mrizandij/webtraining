<h2 class="page-title">
    Dashboard
</h2>
<br>
<div class="alert alert-success" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24"
        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <circle cx="12" cy="7" r="4" />
        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
    </svg>
    Selamat datang <b> <?= $this->session->userdata("username") ?> </b> Sebagai
    <b> <?= ucwords($this->session->userdata("level")); ?> </b>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        1352 Pelanggan
                    </div>
                    <div class="text-muted"> Data Pelanggan </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-green text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        132 Transaksi
                    </div>
                    <div class="text-muted"> Transaksi hari ini</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="3" y1="21" x2="21" y2="21" />
                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                        <line x1="5" y1="21" x2="5" y2="10.85" />
                        <line x1="19" y1="21" x2="19" y2="10.85" />
                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        10 Cabang
                    </div>
                    <div class="text-muted"> Data Cabang </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-orange text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                        <path d="M12 3v3m0 12v3" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        Rp. 100.000.000
                    </div>
                    <div class="text-muted"> Pendapatan Hari Ini </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Grafik Penjualan </h3>
            </div>
            <div class="card-body">
                <p></p>
            </div>
        </div>
    </div>

</div>