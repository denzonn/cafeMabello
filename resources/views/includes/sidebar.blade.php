<div class="flex flex-col h-full justify-between text-gray-600">
    @php
        $user = Auth::user();
    @endphp
    <ul class="flex flex-col gap-4 menu text-base">
        @if ($user->roles === 'ADMIN')
            <li
                class="{{ request()->is('admin/dashboard*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/admin/dashboard" class="p-0"><i class="fa-solid fa-house pr-1"></i> Dashboard</a>
            </li>
            <li
                class="{{ request()->is('admin/chair-number*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/admin/chair-number" class="p-0"><i class="fa-solid fa-chair"></i> Nomor Kursi</a>
            </li>
            <li
                class="{{ request()->is('admin/category*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/admin/category" class="p-0"><i class="fa-solid fa-layer-group"></i> Kategori</a>
            </li>
            <li
                class="{{ request()->is('admin/topping*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/admin/topping" class="p-0"><i class="fa-solid fa-plate-wheat"></i> Topping</a>
            </li>
            <li
                class="{{ request()->is('admin/product*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/admin/product" class="p-0"><i class="fa-solid fa-utensils"></i> Menu</a>
            </li>
            <li
                class="{{ request()->is('admin/transaction-proses*', 'admin/transaction-unpaid*', 'admin/transaction-paid*', 'admin/transaction-cancel*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <div class="p-0"><i class="fa-solid fa-cash-register"></i> Transaksi</div>
            </li>
            <ul id="transaction-submenu" class="hidden px-4 mt-0">
                <li><a href="/admin/transaction-proses" class="hover:bg-primary hover:text-white">Proses</a></li>
                <li><a href="/admin/transaction-unpaid" class="hover:bg-primary hover:text-white">Unpaid</a></li>
                <li><a href="/admin/transaction-paid" class="hover:bg-primary hover:text-white">Paid</a></li>
                <li><a href="/admin/transaction-cancel" class="hover:bg-primary hover:text-white">Cancel</a></li>
            </ul>
        @else
            <li class="font-semibold text-xl">
                Transaksi
            </li>
            <li
                class="{{ request()->is('cashier/transaction-proses*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/cashier/transaction-proses" class="p-0"><i class="fa-solid fa-cash-register"></i>Proses</a>
            </li>
            <li
                class="{{ request()->is('cashier/transaction-unpaid*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/cashier/transaction-unpaid" class="p-0"><i class="fa-solid fa-wallet"></i>Belum Bayar</a>
            </li>
            <li
                class="{{ request()->is('cashier/transaction-paid*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/cashier/transaction-paid" class="p-0"><i class="fa-solid fa-circle-check"></i>Sukses</a>
            </li>
            <li
                class="{{ request()->is('cashier/transaction-cancel*') ? 'bg-primary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-primary hover:text-white transition">
                <a href="/cashier/transaction-cancel" class="p-0"><i
                        class="fa-solid fa-rectangle-xmark"></i>Batal</a>
            </li>
        @endif
    </ul>
    <div>
        <ul>
            <li class="py-2 rounded-md px-6 hover:bg-red-500 hover:text-white  transition">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa-solid fa-right-from-bracket pr-1"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var transactionMenuItem = document.querySelector('.fa-cash-register').parentElement;
        var transactionSubmenu = document.getElementById('transaction-submenu');

        transactionMenuItem.addEventListener('click', function(event) {
            event.preventDefault();
            transactionSubmenu.classList.toggle('hidden');
        });
    });
</script>
