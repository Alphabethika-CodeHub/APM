<div class="row justify-content-center" id="form-lapor">
    <div class="col-md-8">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="">
                        <div class="form-body">
                            <div class="row">

                                <h3 class="text-center">Form Laporan</h3>

                                <hr class="mt-2 mb-4">

                                <p class="text-center">Isi Laporan Anda Dengan Lengkap Dan Benar</p>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="title">Judul Laporan</label>
                                        <div class="position-relative">
                                            <input type="text" name="title" class="form-control" placeholder="Judul Laporan" id="username">
                                            <div class="form-control-icon">
                                                <i class="bi bi-map-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="subject">Ketik Laporan Anda</label>
                                    <div class="form-group with-title mb-3">
                                        <textarea name="subject" class="form-control" rows="3"></textarea>
                                        <label>Isi Lengkap Laporan Anda</label>
                                    </div>                                           
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="location">Lokasi</label>
                                        <div class="position-relative">
                                            <input type="text" name="location" class="form-control" placeholder="Lokasi" id="username">
                                            <div class="form-control-icon">
                                                <i class="bi bi-map-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-2 mb-1">
                                    <label for="location">Upload Foto</label>
                                    <input type="file" class="image-preview-filepond">
                                </div>

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="location">Tanggal Kejadian</label>
                                        <div class="position-relative">
                                            <input type="date" name="" class="form-control">
                                            <div class="form-control-icon">
                                                <i class="bi bi-clock-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class='form-check'>
                                        <div class="checkbox mt-2">
                                            <input checked type="checkbox" id="Anonim" class='form-check-input' value="B" onclick="populateData(event)">
                                            <label for="remember-me-v" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">Anonim?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Kirim Laporan</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>