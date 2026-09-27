<!DOCTYPE html>
<html>

<head>

    <title>Customer Records</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }


        h2 {
            text-align: center;
        }


        .logout {
            float: right;
            padding: 8px 15px;
        }


        .customer {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
        }


        .status-input {
            padding: 8px;
            width: 250px;
            margin-top: 10px;
        }


        .status-button {
            padding: 8px 15px;
            margin-left: 5px;
            cursor: pointer;
        }


        .status-text {
            margin-top: 10px;
            font-weight: bold;
        }


        .pagination {
            margin-top: 20px;
        }

    </style>

</head>


<body>


    <!-- Logout Button -->

    <a href="/logout">

        <button class="logout">
            Logout
        </button>

    </a>



    <!-- Page Heading -->

    <h2>
        Customer Records
    </h2>



    <!-- Customer Records -->

    @foreach($data as $d)

        <div class="customer">

            <p>
                <b>ID:</b> {{ $d->id }}
            </p>


            <p>
                <b>Name:</b> {{ $d->name }}
            </p>


            <p>
                <b>Contact:</b> {{ $d->contact }}
            </p>


            <p>
                <b>Address:</b> {{ $d->address }}
            </p>


            <p>
                <b>Date & Time:</b> {{ $d->created_at }}
            </p>



            <!-- Order Status Input -->

            <input
                type="text"
                class="status-input"
                id="status-{{ $d->id }}"
                placeholder="Enter Order Status"
            >


            <!-- Submit Button -->

            <button
                type="button"
                class="status-button"
                onclick="saveStatus({{ $d->id }})"
            >
                Submit
            </button>



            <!-- Display Saved Status -->

            <div
                class="status-text"
                id="show-status-{{ $d->id }}"
            ></div>


        </div>

    @endforeach



    <!-- Pagination -->

    <div class="pagination">

        {{ $data->links() }}

    </div>



    <!-- JavaScript -->

    <script>

        // Save Order Status

        function saveStatus(id)
        {
            let input = document.getElementById('status-' + id);

            let status = input.value;


            // Check Empty Input

            if (status.trim() === '') {

                alert('Please enter order status');

                return;
            }


            // Save status in localStorage

            localStorage.setItem(
                'order_status_' + id,
                status
            );


            // Show status on page

            document.getElementById(
                'show-status-' + id
            ).innerText =
                'Order Status: ' + status;

        }



        // Load Saved Status After Page Reload

        window.onload = function()
        {

            @foreach($data as $d)

                let savedStatus{{ $d->id }} =
                    localStorage.getItem(
                        'order_status_{{ $d->id }}'
                    );


                if (savedStatus{{ $d->id }}) {

                    // Show saved status

                    document.getElementById(
                        'show-status-{{ $d->id }}'
                    ).innerText =
                        'Order Status: ' +
                        savedStatus{{ $d->id }};


                    // Put saved value back into input box

                    document.getElementById(
                        'status-{{ $d->id }}'
                    ).value =
                        savedStatus{{ $d->id }};

                }

            @endforeach

        };

    </script>


</body>

</html>