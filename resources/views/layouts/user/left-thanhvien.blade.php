<div class="block-account">

    <h5 class="title-account">Trang tài khoản</h5>

    <p>Xin chào, <span style="color:#ef4339;">{{Session::get('customers')->fullname}}</span>&nbsp;!</p>

    <ul>

        <li>

            <a disabled="disabled" class="title-info <?=($action=='thong-tin')?'active':''?>" href="account/thong-tin">

                 <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>



                <span>Thông tin tài khoản</span>

            </a>

        </li>

        <li>

            <a class="title-info  <?=($action=='order')?'active':''?>" href="account/order">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z"></path></svg>

                <span>Quản lý đơn hàng</span>

            </a>

        </li>

        <li>

            <a class=" title-info  <?=($action=='address')?'active':''?>" href="account/address">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg>

                <span>Sổ địa chỉ</span>

            </a>

        </li>

        <li>

    </ul>

</div>