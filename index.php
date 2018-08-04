<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>

<body ng-app="myApp" ng-controller="myCtrl">

<nav class="navbar navbar-expand-sm bg-light navbar-light" style="margin-bottom:2%">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>

<div class="container" style="margin-bottom:5%">
  <h2>Tambah Data User</h2>
  <form>
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="nama" ng-model="nama">
        </div>
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Email Anda" name="email" ng-model="email">
        </div>
        <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" ng-model="alamat">
        </div>
        <div class="form-group">
        <label for="nomorHp">Nomor HP:</label>
        <input type="text" class="form-control" id="nomorHp" placeholder="Nomor HP" name="nomorHP" ng-model="nomorHp">
        </div>
        <button type="submit" class="btn btn-primary" ng-click="simpan()">Simpan</button>
  </form>
</div>


<div class="container">
  <h2>Data User</h2>
  <p>Berikut data pengguna aplikasi:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Nomor HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr  ng-repeat="i in items">
        <td>{{i.nama}}</td>
        <td>{{i.email}}</td>
        <td>{{i.alamat}}</td>
        <td>{{i.nomorHp}}</td>
        <td>Ubah - Hapus</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>

<script>
//ini script AngularJS
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {

    //Ambil Data
    $http.get("http://localhost:8080/api/get")
    .then(function(response) {
        $scope.items = response.data;
        console.log($scope.items);
    });

    $scope.nama = "";
    $scope.alamat = "";
    $scope.nomorHp = "";
    $scope.email = "";

    $scope.simpan = function (){

        $scope.message = {
            "nama": $scope.nama,
            "alamat": $scope.alamat,
            "email": $scope.email,
            "nomorHp": $scope.nomorHp
        }

        console.log ($scope.message);


        //Simpan Data
        $http({
        method: 'POST',
        url: 'http://localhost:8080/api/post',
        data: $scope.message,
        headers: {'Content-Type': 'application/json'}
        })
        .then(function(response) {
            location.reload();
        }, 
        function(response) { // optional
                // failed
        });
    }
});
</script>