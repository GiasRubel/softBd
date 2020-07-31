<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.19/lodash.min.js" integrity="sha512-/A6lxqQJVUIMnx8B/bx/ERfeuJnqoWPJdUxN8aBj+tZYL35O998ry7UUGoN65PSUNlJNrqKZrDENi4i1c3zy4Q==" crossorigin="anonymous"></script>


    <!-- Styles -->
    <style>e
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Employee table
            <button class="btn btn-danger" id="update" type="button">Update All</button>
        </div>

        <div id="table-data">
            @include('employee', ['links' => $links])
        </div>
    </div>
</div>
</body>
</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        let newArray = [];

        $.ajax({
            url: "/fetch-data?page=" + 1,
            dataType: "json",
            success: function (res) {
                let data = res[0].data;
                newArray = _.unionBy(data, newArray, 'id');

                var html = '';

                for (var count = 0; count < data.length; count++) {
                    html += '<tr>';
                    html += '<td  class="column_name" data-column_name="id" data-id="' + data[count].id + '">' + data[count].id + '</td>';
                    html += '<td contenteditable class="column_name" data-column_name="name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                    html += '<td contenteditable class="column_name" data-column_name="emoplyee_no" data-id="' + data[count].id + '">' + data[count].emoplyee_no + '</td>';
                    html += '<td contenteditable class="column_name" data-column_name="company" data-id="' + data[count].id + '">' + data[count].company + '</td>';
                    html += '<td contenteditable class="column_name" data-column_name="department" data-id="' + data[count].id + '">' + data[count].department + '</td>';
                    html += '<td contenteditable class="column_name" data-column_name="salary" data-id="' + data[count].id + '">' + data[count].salary + '</td>';
                    html += '<td  class="column_name" data-column_name="designation_id" data-id="' + data[count].id + '">' + data[count].designation.title + '</td>';
                    html += '<td  class="column_name" data-column_name="joining_date" data-id="' + data[count].id + '">' + data[count].joining_date + '</td>';
                    html += '<td  class="column_name" data-column_name="termination_date" data-id="' + data[count].id + '">' + data[count].termination_date + '</td>';

                }
                $('tbody').html(html);


            }
        });
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];

            $.ajax({
                url: "/fetch-data?page=" + page,
                success: function (res) {
                    console.log(res)
                    let data = res[0].data;
                    newArray = _.unionBy(newArray, data, 'id');

                    var html = '';
                    newArray.forEach((value, key) => {
                        data.forEach((v, k) => {
                            if (v.id === value.id) {
                                data[k].name = value.name;
                                data[k].emoplyee_no = value.emoplyee_no;
                                data[k].company = value.company;
                                data[k].department = value.department;
                                data[k].salary = value.salary;
                                data[k].designation_id = value.designation_id;
                                data[k].joining_date = value.joining_date;
                                data[k].termination_date = value.termination_date;
                            }
                        })
                    })

                    for (var count = 0; count < data.length; count++) {
                        html += '<tr>';
                        html += '<td  class="column_name" data-column_name="id" data-id="' + data[count].id + '">' + data[count].id + '</td>';
                        html += '<td contenteditable class="column_name" data-column_name="name" data-id="' + data[count].id + '">' + data[count].name + '</td>';
                        html += '<td contenteditable class="column_name" data-column_name="emoplyee_no" data-id="' + data[count].id + '">' + data[count].emoplyee_no + '</td>';
                        html += '<td contenteditable class="column_name" data-column_name="company" data-id="' + data[count].id + '">' + data[count].company + '</td>';
                        html += '<td contenteditable class="column_name" data-column_name="department" data-id="' + data[count].id + '">' + data[count].department + '</td>';
                        html += '<td contenteditable class="column_name" data-column_name="salary" data-id="' + data[count].id + '">' + data[count].salary + '</td>';
                        html += '<td  class="column_name" data-column_name="designation_id" data-id="' + data[count].id + '">' + data[count].designation.title + '</td>';
                        html += '<td  class="column_name" data-column_name="joining_date" data-id="' + data[count].id + '">' + data[count].joining_date + '</td>';
                        html += '<td  class="column_name" data-column_name="termination_date" data-id="' + data[count].id + '">' + data[count].termination_date + '</td>';

                    }
                    $('tbody').html(html);

                }
            });
        });

        $(document).on('blur', '.column_name', function () {
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            var id = $(this).data("id");
            var foundIndex = newArray.findIndex(x => x.id === id);

            column_name === 'name' ? newArray[foundIndex].name = column_value : newArray[foundIndex].name;
            column_name === 'company' ? newArray[foundIndex].company = column_value : newArray[foundIndex].company;
            column_name === 'emoplyee_no' ? newArray[foundIndex].emoplyee_no = column_value : newArray[foundIndex].emoplyee_no;
            column_name === 'department' ? newArray[foundIndex].department = column_value : newArray[foundIndex].department;
            column_name === 'salary' ? newArray[foundIndex].salary = column_value : newArray[foundIndex].salary;
        });

        $(document).on('click', '#update', function (event) {
            $.ajax({
                type: 'POST',
                url: '/update',
                data: {newArray},

                success: function (data) {
                 if(data.message) {
                     location.reload();
                 }
                }
            });
        });

    });


</script>


