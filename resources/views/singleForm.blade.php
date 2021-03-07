<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</head>
<body>
<!-- NavBar Start Here -->
<nav class="navbar navbar-light bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ItBeep</a>
    </div>
</nav>
<!-- NavBar End Here -->

<!-- Form Start Here -->

<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 mt-5">
            <form method="POST" action="/" id="userForm">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
                @error('name')
                <p class="text-danger">{{$message }}</p>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                <p class="text-danger">{{$message }}</p>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mobile</label>
                    <input type="tel" class="form-control" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}">
                </div>
                @error('mobile')
                <p class="text-danger">{{$message }}</p>
                @enderror
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="userData()">
                    Submit
                </button>

                <!-- Modal -->


            <div class="modal fade" id="serivceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-4">

                                @foreach($services as $service)
                                    <button type="button" class="btn btn-primary m-4" id="{{ $service->service_name }}" name="{{ $service->service_name }}" value="0" onclick="selector(this.id)">{{$service->service_name}}</button>
                                @endforeach
                                <input id="service11" type="hidden" name="service1" value="0" />
                                <input id="service12" type="hidden" name="service2" value="0" />
                                <input id="service13" type="hidden" name="service3" value="0" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="goTointrest" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="serviceData()">
                                        Next
                                    </button>
                                </div>

                            <!-- Modal -->
                            <div class="modal fade" id="intrestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="intrestModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-3">

                                                @foreach($intrest as $intrest)
                                                    <button type="button" class="btn btn-primary m-4" id="{{ $intrest->intrest_time }}" value="0" onclick="selectintrest(this.id)">{{$intrest->intrest_time}}</button>
                                            @endforeach
                                        </div>
                                        <input id="intrest" type="hidden" name="intrest" />
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Finish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="col-4"></div>
    </div>
</div>

<!-- Form End Here -->

</body>
</html>
<script>
    function userData(){
        $('#serivceModal').modal("show")
    }
</script>

<script>
    document.getElementById('goTointrest').disabled = true;
</script>

<script>
function selector(id) {
    let service1 = document.getElementById("service1").value;
    let service2 = document.getElementById("service2").value;
    let service3 = document.getElementById("service3").value;

        if ( id == 'service1' && service1 == '0') {
            document.getElementById("service1").value = '1';
            document.getElementById("service11").value = '1';
            document.getElementById("service1").className = "btn btn-secondary m-4";
            document.getElementById('goTointrest').disabled = false;
        }
        else if( id == 'service1' && service1 == '1'){
            document.getElementById("service1").value = '0';
            document.getElementById("service11").value = '0';
            document.getElementById("service1").className = "btn btn-primary m-4";
        }
        if (id == 'service2' && service2 == '0') {
            document.getElementById("service2").value = '1';
            document.getElementById("service12").value = '1';
            document.getElementById("service2").className = "btn btn-secondary m-4";
            document.getElementById('goTointrest').disabled = false;
        }
        else if( id == 'service2' && service2 == '1'){
            document.getElementById("service2").value = '0';
            document.getElementById("service12").value = '0';
            document.getElementById("service2").className = "btn btn-primary m-4";
        }
        if (id == 'service3' && service3 == '0') {
            document.getElementById("service3").value = '1';
            document.getElementById("service13").value = '1';
            document.getElementById("service3").className = "btn btn-secondary m-4";
            document.getElementById('goTointrest').disabled = false;
        }
        else if( id == 'service3' && service3 == '1'){
            document.getElementById("service3").value = '0';
            document.getElementById("service13").value = '0';
            document.getElementById("service3").className = "btn btn-primary m-4";
        }
}
</script>

<script>
    function selectintrest(id){
        let intrest1 = document.getElementById("general").value;
        let intrest2 = document.getElementById("one_week").value;
        let intrest3 = document.getElementById("one_month").value;

        if ( id == 'general' && intrest1 == 0) {
            document.getElementById("intrest").value = 'General';
            document.getElementById("general").className = "btn btn-secondary pr-4 pl-4";
            document.getElementById("one_week").className = "btn btn-primary pr-4 pl-4";
            document.getElementById("one_month").className = "btn btn-primary pr-4 pl-4";
        }
        if (id == 'one_week' && intrest2 == 0) {
            document.getElementById("intrest").value = 'Week';
            document.getElementById("one_week").className = "btn btn-secondary pr-4 pl-4";
            document.getElementById("general").className = "btn btn-primary pr-4 pl-4";
            document.getElementById("one_month").className = "btn btn-primary pr-4 pl-4";
        }
        if ( id == 'one_month' && intrest3 == 0) {
            document.getElementById("intrest").value = 'Month';
            document.getElementById("one_month").className = "btn btn-secondary pr-4 pl-4";
            document.getElementById("general").className = "btn btn-primary pr-4 pl-4";
            document.getElementById("one_week").className = "btn btn-primary pr-4 pl-4";
        }
    }
</script>

<script>
    function serviceData(){
        $('#intrestModal').modal("show");
    }

</script>


<script type="text/javascript">
    $(document).ready(function (){
        $('#userForm').on('submit',function (e){
            $.ajax({
                type: "POST",
                url: "/",
                data: $('#userForm').serialize(),
                success: function (response){
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank you',
                        text: 'We will contact with you soon!'
                    })
                    $('#serivceModal').modal('hide')
                    $('#intrestModal').modal('hide')
                },
                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Enter Valid Data'
                    })
                }
            });
        });
    });
</script>
