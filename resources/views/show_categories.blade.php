<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .categories-list {
            margin-top: 20px;
        }

        .category-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        h2 {
            color: #007bff;
        }

        p {
            color: #666;
            margin: 8px 0;
        }

        p.created-by {
            font-weight: bold;
        }

        p.created-at {
            font-style: italic;
        }

        p.not-found {
            color: #d9534f;
            font-weight: bold;
        }
    </style>
    <title>Categories</title>
</head>
<body>
    <div class="container">
        <h1>Categories</h1>
        <div class="categories-list">
            @if($category)
                <div class="category-item">
                    <h2>{{ $category->cat_name }}</h2>
                    <p>{{ $category->cat_descp }}</p>
                    <p class="created-by">Created by: {{ $category->user->name }}</p>
                    <p class="created-at">Created at: {{ $category->created_at }}</p>
                </div>
            @else
                <p class="not-found">Category not found</p>
            @endif
        </div>
    </div>
</body>
</html>
