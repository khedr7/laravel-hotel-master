@extends('layouts.app', ['activePage' => 'review', 'titlePage' => __('Reviews')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        @foreach ($stats as$label=> $stat )
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">stars</i>
                  </div>
                  <p class="card-category">{{$label}}</p>
                  <h3 class="card-title">{{$stat}}
                  </h3>
                </div>
              </div>
            </div>
            @endforeach
          </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Ratings Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Job Title
                  </th>
                  <th>
                    Rate
                  </th>
                  <th>
                    Customer Name
                  </th>
                  <th>
                    Message
                  </th>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                <tr>
                    <a
                           >
                        <td>
                            {{ $review->id }}
                        </td>
                        <td>
                            {{ $review->name }}
                        </td>
                        <td>
                            {{ $review->job_title }}
                        </td>
                        <td>
                            @for ($i=1; $i <= 5 ; $i++)
                            <span class="fa fa-star checked{{ ($i <= $review->rate) ? '' : '-empty'}}"></span>
                          @endfor
                        </td>
                        <td>
                            {{$review->user->name}}
                        </td>
                        <td>
                            {{$review->message}}
                        </td>
                    </a>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reviews->links("pagination::bootstrap-4") }}
            </div>
          </div>
        </div>
      </div>
@endsection
