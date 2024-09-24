<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">{{Auth::user()->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <div class="flex-shrink-0 p-3" style="width: 180px;">
				    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
				      <span class="fs-5 fw-semibold">{{Auth::user()->name}}</span>
				    </a>
				    <ul class="list-unstyled ps-0">
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
				          Enrollments
				        </button>
				        <div class="collapse show" id="home-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="{{route('parent-enrollment', 'sponsored')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Parent Sponsored</a></li>
				            <li><a href="{{route('parent-enrollment', 'self-sponsored')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Self Sponsored</a></li>
				            <li><a href="{{route('parent-enrollment', 'scholarship')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Scholarship</a></li>
				            <li><a href="{{route('parent-enrollment', 'job-application')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Job Application</a></li>
				          </ul>
				        </div>
				      </li>
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
				          Users
				        </button>
				        <div class="collapse" id="orders-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="{{route('user', 'administrator')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Administrator</a></li>
				            <li><a href="{{route('user', 'educator')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Educator</a></li>
				            <li><a href="{{route('user', 'parent')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Parent</a></li>
				            <li><a href="{{route('user', 'student')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Student</a></li>
				          </ul>
				        </div>
				      </li>
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
				          Courses
				        </button>
				        <div class="collapse" id="dashboard-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="{{route('course-section')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Create New</a></li>
				            <li><a href="{{route('course', 'up-skill')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Up-skill Graduate</a></li>
				            <li><a href="{{route('course', 'artisan')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Artisan Graduate</a></li>
				            <li><a href="{{route('course', 'craft-certificate')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Craft Certificate Graduate</a></li>
				            <li><a href="{{route('course', 'diploma')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Diploma Graduate</a></li>
				          </ul>
				        </div>
				      </li>
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#payments-collapse" aria-expanded="false">
				          Payments
				        </button>
				        <div class="collapse" id="payments-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="{{route('payment', 'order')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Orders</a></li>
				            <li><a href="{{route('payment', 'transaction')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Transactions</a></li>
				          </ul>
				        </div>
				      </li>
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#graduation-collapse" aria-expanded="false">
				          Graduation
				        </button>
				        <div class="collapse" id="graduation-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Artisan</a></li>
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Certificate</a></li>
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Diploma</a></li>
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Up-skill</a></li>
				          </ul>
				        </div>
				      </li>
				      <li class="border-top my-3"></li>
				      <li class="mb-1">
				        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
				          Account
				        </button>
				        <div class="collapse" id="account-collapse">
				          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New...</a></li>
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
				            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
				            <!-- <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li> -->
				            <li>
				            	<!-- Authentication -->
				            <form method="POST" action="{{ route('logout') }}">
				              @csrf
					            <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="link-body-emphasis d-inline-flex text-decoration-none rounded">{{ __('Sign out') }}</a>
					            </form>
				            </li>
				          </ul>
				        </div>
				      </li>
				    </ul>
				  </div>
        </div>
      </div>
    </div>