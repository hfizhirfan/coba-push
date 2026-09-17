/**
 * Brows by Veron - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Menu Drawer
    var mobileToggle = document.getElementById('bbz-mobile-toggle');
    var mobileClose = document.getElementById('bbz-mobile-close');
    var mobileDrawer = document.getElementById('bbz-mobile-drawer');
    var mobileBackdrop = document.getElementById('bbz-mobile-backdrop');
    var mobileLinks = document.querySelectorAll('.bbz-mobile-link');

    function openMobileMenu() {
        if (mobileDrawer && mobileBackdrop) {
            mobileDrawer.classList.add('is-open');
            mobileBackdrop.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeMobileMenu() {
        if (mobileDrawer && mobileBackdrop) {
            mobileDrawer.classList.remove('is-open');
            mobileBackdrop.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', openMobileMenu);
    }
    if (mobileClose) {
        mobileClose.addEventListener('click', closeMobileMenu);
    }
    if (mobileBackdrop) {
        mobileBackdrop.addEventListener('click', closeMobileMenu);
    }

    mobileLinks.forEach(function (link) {
        link.addEventListener('click', closeMobileMenu);
    });

    // 2. Sticky Header Shadow on Scroll
    var header = document.getElementById('bbz-header');
    window.addEventListener('scroll', function () {
        if (header) {
            if (window.scrollY > 20) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        }
    }, { passive: true });

    // 3. Terms & Conditions Accordion
    var termItems = document.querySelectorAll('.bv-term-item, .bbz-term-item');
    termItems.forEach(function (item) {
        var trigger = item.querySelector('.bv-term-trigger, .bbz-term-trigger');
        if (trigger) {
            trigger.addEventListener('click', function () {
                var isActive = item.classList.contains('is-active');

                termItems.forEach(function (otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('is-active');
                    }
                });

                if (isActive) {
                    item.classList.remove('is-active');
                } else {
                    item.classList.add('is-active');
                }
            });
        }
    });

    // 4. Gallery Filter Tabs
    var filterBtns = document.querySelectorAll('.bv-filter-btn, .bbz-filter-btn');
    var galleryItems = document.querySelectorAll('.bbz-gallery-item');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = this.getAttribute('data-filter');

            filterBtns.forEach(function (b) {
                b.classList.remove('active');
            });
            this.classList.add('active');

            galleryItems.forEach(function (item) {
                var itemCat = item.getAttribute('data-category');
                if (filter === 'all' || itemCat === filter) {
                    item.style.display = 'block';
                    setTimeout(function () {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    setTimeout(function () {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // 5. Scroll Reveal Animation
    var revealElements = document.querySelectorAll('.bbz-reveal');
    if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(function (el) {
            revealObserver.observe(el);
        });
    } else {
        revealElements.forEach(function (el) {
            el.classList.add('is-visible');
        });
    }
});
