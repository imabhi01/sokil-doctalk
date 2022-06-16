<footer class="shadow-sm">
    <div class="left-menu">
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Company</li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">About us</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Careers</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Blog</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Partner with PharEasy</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Sell At PharmEasy</a>
            </li>
        </ul>
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Our Services</li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Order Medicine</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Health Care Products</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Lab Tests</a>
            </li>
        </ul>
    </div>
    <div class="center-left">
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Featured Categories</li>
            @foreach($categories as $category)
                <li class="footer-menu-item-child">
                    <a href="#" class="footer-item">{{ $category->title ?? '' }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="center-right">
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Need Help</li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Browse All Medicines</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Browse All Molecules</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">FAQs</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Blog</a>
            </li>
        </ul>
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Policy Info</li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Editorial Policy</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Privacy Policy</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Vulnerability Disclosure</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Terms and Conditions</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Customer Support Policy</a>
            </li>
            <li class="footer-menu-item-child">
                <a href="#" class="footer-item">Return Policy</a>
            </li>
        </ul>
    </div>
    <div class="right-menu">
        <ul class="footer-menu-list">
            <li class="footer-menu-item">Follow Us</li>
        </ul>
        <i class="footer-icons fab fa-instagram"></i>
        <i class="footer-icons fab fa-facebook"></i>
        <i class="footer-icons fab fa-youtube"></i>
        <i class="footer-icons fab fa-twitter"></i>
    </div>
</footer>