<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Add a New Category</h2>
    
    <form action="{{ route('addcategory.post') }}" method="post" id="addCategoryform">
        @csrf
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" name="cat_name" class="form-control" id="categoryName" placeholder="Enter the category name" required>
        </div>

        <div class="form-group">
            <label for="categoryDescription">Category Description</label>
            <textarea class="form-control" name="cat_descp" id="categoryDescription" rows="4" placeholder="Enter the category description" required></textarea>
        </div>

        <div class="form-group">
            <div id="catAlert" class="text-danger font-weight-bolder"></div>
          </div>

        <div class="form-group">
            <input type="submit" id="addCat-btn" value="Add" class="btn btn-primary btn-lg btn-block myBtn" />
          </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

    $(document).ready(function (){
      
        $("#addCategoryform").submit( function(e){
            e.preventDefault();
            $("#addCat-btn").val('Please Wait..');

            var form = $("#addCategoryform")[0];
            var data = new FormData(form);

            $.ajax({
                type : "POST",
                url : "{{ route('addcategory.post') }}",
                data: data,
                processData: false,
                contentType: false,

                success: function(response){
                    // console.log(response);
                    $("#catAlert").text("Category Added");
                    $("#addCat-btn").val('Add');

                },
                error: function (error) {
                    $("#catAlert").text("Category Not Added");
                    $("#addCat-btn").val('Add');
                }
            });
        });
    });
</script>
</body>
</html>
