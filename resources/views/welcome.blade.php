<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

  <div class="container">
    <h3 class="text-center bg-dark text-white fw-bold py-3 mt-5 mb-5">Multi Delete</h3>

    @if (Session::has('message'))
      <p class="alert alert-success my-3">{{ Session::get('message') }}</p>
    @endif

    <form action="{{ route('user.delete') }}" method="post">
      @csrf

      <button type="submit" class="btn btn-danger mb-3">Delete Selected</button>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th><input type="checkbox" name="cid" class="selected_all_id"></th>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <th><input type="checkbox" name="cid" class="selected_all_id"></th>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tfoot>

        <tbody>

          @if (count($users) > 0)
            @foreach ($users as $key => $user)
              <tr id="user_ids{{ $user->id }}">
                <td><input type="checkbox" name="ids[]" class="checkbox_id" value="{{ $user->id }}"></td>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                </td>
              </tr>


              <!-- Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are your sure delete user
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                      <a href="{{ route('destroy', $user->id) }}" class="btn btn-danger">Delete Now</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <td colspan="12">
              <p class="text-center m-0">No Data Found!</p>
            </td>
          @endif

        </tbody>

      </table>

    </form>

  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.selected_all_id').click(function() {
        $('.checkbox_id').prop('checked', $(this).prop('checked'));
      });
    });
  </script>




  {{-- <script>
    $(document).ready(function() {
      $('#deleteAll').click(function(e) {
        e.preventDefault();

        // alert('ok');

        var all_ids = [];


        $('input:checkbox['
          name = ids ']:checked').each(function() {
          all_ids.push($(this).val());
        });

        $.ajax({
          url: "{{ route('user.delete') }}",
          data: {
            ids::all_ids,
            _token: '{{ csrf_token() }}'
          },
          type: "DELETE",
          success: function(response) {
            $.each(all_ids, function(key, val)) {
              $('#user_ids' + val).remove();
            }
          }
        });

        // alert(all_ids);

      })
    });
  </script> --}}

</body>

</html>
