<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ URL('vendors/toastify/toastify.css') }}">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('style')
    

</head>
<body>

    @yield('content')
    
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
        );
    </script>

    <script>
        FilePond.create( document.querySelector('.image-preview-filepond'), { 
            allowImagePreview: true, 
            allowImageFilter: false,
            allowImageExifOrientation: false,
            allowImageCrop: false,
            acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
            fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
                resolve(type);
            })
        });
    </script>

    <script>
        var targetDiv = document.getElementById('anonim');
        var htmlContent = '';

        function populateData(event){
        switch(event.target.value){
            case 'A':{
                htmlContent = 
                    `
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="email">Alamat Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" class="form-control" placeholder="Email" id="username" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                break;
            }
            case 'B':{
                htmlContent = 
                    `
                    
                    `;
                break;
            }
        }
            targetDiv.innerHTML = htmlContent;
        }

    </script>

    @yield('script')
</body>
</html>