{{-- Details Group --}}
    {{-- <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted"><span class="badge bg-dark rounded-pill me-2"><div class="spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> Process</span>3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small>Updated At: 21 March 2021</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-success">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted"><span class="badge bg-success rounded-pill me-2"><i class="fas fa-check"></i> Completed</span>3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small>Updated At: 21 March 2021</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-warning">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted"><span style="background-color: orange" class="badge rounded-pill me-2"><i class="fas fa-times"></i> Pending</span>3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small>Updated At: 21 March 2021</small>
                </a>
            </div>
        </div>
    </div> --}}
    <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-12">
            <div class="list-group shadow">
                @foreach ($complaints as $c)
                    <a href="{{ URL('/detail/'.$c->id) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $c->title }}</h5>
                            
                          <small class="text-muted">

                              @if ($c->status == "Process")
                                <span class="badge bg-dark rounded-pill me-2">
                                  <div class="spinner-grow spinner-grow-sm" role="status"></div> 
                                  {{ $c->status }}
                                </span>
                              @elseif ($c->status == "Pending")
                                <span style="background-color: orange" class="badge rounded-pill me-2">
                                  <i class="fas fa-times"></i>
                                  {{ $c->status }}
                                </span>
                              @elseif ($c->status == "Completed")
                                <span class="badge bg-success rounded-pill me-2">
                                  <i class="fas fa-check"></i>
                                  {{ $c->status }}
                                </span>
                              @endif                            
                              
                              {{ $c->created_at->diffForHumans() }}
                              
                          </small>

                        </div>
                        <p class="mb-1">{{ Str::limit($c->subject, 100, '...') }}</p>
                        <small>Updated At: {{ $c->updated_at->diffForHumans() }}</small>
                    </a>    
                @endforeach            
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
      {{ $complaints->links() }}
    </div>
    {{-- Details Group --}}