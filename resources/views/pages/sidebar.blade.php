  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link" style="background-color: #367fa9;">
      
      <span class="brand-text ">SANTOSH PAKODEWALA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
        </div>
        <div class="info">
          <a href="#" class="d-block">SANTOSH PAKODEWALA</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/home" class="nav-link active">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('vendor.index') }} " class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Vendor Masters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('item.index') }} " class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Item Masters</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('unit.index') }} " class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Unit Masters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('branch.index') }} " class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Branches</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('ViewUser.index') }} " class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fa fa-group"></i>
              <p>
              Manage Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.index') }}" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Add Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('attee.index') }}" class="nav-link">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              
           
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-files-o"></i>
              <p>
                Sell Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sellitem/item" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sell.index') }}" class="nav-link">
                   <i class="fa fa-shopping-cart"></i>
                  <p>View Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sell.create') }}" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Sell Item</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-files-o"></i>
              <p>
                Purchase Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('invoice.index') }}" class="nav-link">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Purchase Order</p>
                </a>
              </li>
            
            </ul>
          </li>
        
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-files-o"></i>
              <p>
                Daily Expenses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('expenses.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('expenses.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Expenses</p>
                </a>
           
            </ul>
          </li>
          @elsecan('isUser')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fa fa-group"></i>
              <p>
              Manage Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{ route('attee.index') }}" class="nav-link">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              
           
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-files-o"></i>
              <p>
                Sell Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sellitem/item" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sell.index') }}" class="nav-link">
                   <i class="fa fa-shopping-cart"></i>
                  <p>View Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sell.create') }}" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Sell Item</p>
                </a>
              </li>
              
            </ul>
          </li>
          @endcan
           
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>