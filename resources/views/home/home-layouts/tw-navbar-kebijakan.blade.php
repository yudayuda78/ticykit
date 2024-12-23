<nav>
    <ul class="flex flex-col gap-y-[20px] w-[350px] font-inter">
        <li class="hover:font-bold">
            <a href="/kebijakan-privasi" class="nav-item">Kebijakan Privasi Belajar Era Digital</a>
        </li>
        <li class="hover:font-bold">
            <a href="/syarat-ketentuan" class="nav-item">Syarat dan Ketentuan Belajar Era Digital</a>
        </li>
        <li class="hover:font-bold">
            <a href="/tentang-kami" class="nav-item">Team at Belajar Era Digital</a>
        </li>
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navItems = document.querySelectorAll('.nav-item');
        const currentPath = window.location.pathname;

        navItems.forEach(item => {
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('font-bold','pointer-events-none');
            }
        });
    });
</script>
