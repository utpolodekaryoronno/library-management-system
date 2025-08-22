<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu {{ Route::is('books.index') || Route::is('books.create') ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class="fe fe-document"></i>
                        <span> Books</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: {{ Route::is('books.index') || Route::is('books.create') ? 'block' : 'none' }};">
                        <li>
                            <a href="{{ route('books.index') }}"
                            class="{{ Route::is('books.index') ? 'link-active' : '' }}">
                            All Books
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('books.create') }}"
                            class="{{ Route::is('books.create') ? 'link-active' : '' }}">
                            Add New Book
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="javascript:void(0)"><i class="fe fe-user"></i> <span> Students </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('students.index') }}"> All Students </a></li>
                        <li><a href="{{ route('students.create') }}"> Add New Student </a></li>
                    </ul>
                </li>

                <li class="{{ Route::is('borrows.index') ? 'active' : '' }}">
                    <a href="{{ route('borrows.index') }}"><i class="fe fe-vector"></i> <span>Borrowing</span></a>
                </li>
                <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Reservation</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
