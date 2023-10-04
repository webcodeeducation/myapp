<!DOCTYPE html>
<html>
<head>
    <title>Import Export Excel to Database Example - ICloudeEMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Export Excel to Database Example - ICloudeEMS
        </div>
        <div class="card-body">
            <form action="{{ route('transimport.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" 
                       href="{{ route('export-trans') }}">
                              Export Financial Transaction Data
                      </a>
            </form>

            
  
            
  
        </div>
    </div>
</div>
     
</body>
</html>