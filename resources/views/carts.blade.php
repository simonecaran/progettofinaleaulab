<x-layout>
    <h4 class='text-center mt-5'>CART</h4>
    
    
        <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('all.announcements')}}" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have {{App\Models\User::countCart()}} items in your cart</p>
                  </div>
                </div>
                @foreach($announcements as $announcement)
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                            @if(count($announcement->images)>0)
                          <img
                            src="{{$announcement->images()->first()->getUrl()}}"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            @else
                            <img src="/img/default.jpg" class="img-fluid rounded-3"  style="width:65px;" alt="">
                            @endif
                        </div>
                        <div class="ms-3">
                          <h5>{{$announcement->title}}</h5>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 80px;">
                          <h5 class="mb-0">{{$announcement->price}}</h5>
                        </div>
                        <livewire:remove-to-cart :announcement="$announcement"/>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
              <div class="col-lg-5">

                <div class="card text-secondary rounded-3" style='background-color:#D8DEE1;'>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-secondary"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-secondary"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-secondary"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-secondary"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div class="form-outline form-secondary mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        
                      </div>

                      <div class="form-outline form-secondary mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-secondary">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-secondary">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">{{$total}}&euro;</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">20.00&euro;</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. shipping)</p>
                      <p class="mb-2">{{$total+20}}&euro;</p>
                    </div>

                      <div class="d-flex justify-content-between">
                  <a href=""class="btn btn-outline-light d-flex justify-content-center align-items-center my-2 fw-bold">Checkout <img src="/img/icone/presto_icona-all.svg" style="width:20px;" alt=""class="ms-2"></a>   

                      </div>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


</x-layout>