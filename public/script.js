// function togglePricing() {
//     const isAnnual = document.getElementById('priceToggle').checked;
//     const cards = document.querySelectorAll('.pricing-card');

//     const monthlyText = [
//         'Ideal for individuals and small projects.',
//         'Perfect for growing teams and serious users.',
//         'For large organizations needing maximum scale.'
//     ];

//     const annualText = [
//         'Save 20% annually on your individual plan!',
//         'Best deal for expanding teams — pay once a year.',
//         'Enterprise annual plan includes full support & savings.'
//     ];

//     const monthlyPrices = ['19', '49', '99'];
//     const annualPrices = ['182', '470', '950'];

//     cards.forEach((card, index) => {
//         // Slide out card
//         card.classList.remove('show');
//         setTimeout(() => {
//             // Update content
//             const priceEl = card.querySelector('.price-display');
//             priceEl.textContent = isAnnual ? annualPrices[index] : monthlyPrices[index];

//             const termEl = card.querySelector('.price-term');
//             termEl.textContent = isAnnual ? '/year' : '/month';

//             const descEl = card.querySelector('p');
//             descEl.textContent = isAnnual ? annualText[index] : monthlyText[index];

//             const btn = card.querySelector('.btn');
//             if (isAnnual) {
//                 if (btn.textContent.includes('Trial')) btn.textContent = 'Start Annual Plan';
//                 else if (btn.textContent.includes('Pro')) btn.textContent = 'Upgrade to Annual';
//                 else btn.textContent = 'Contact Annual Sales';
//             } else {
//                 if (btn.textContent.includes('Annual')) btn.textContent = 'Start Trial';
//                 else if (btn.textContent.includes('Upgrade')) btn.textContent = 'Choose Pro';
//                 else btn.textContent = 'Contact Sales';
//             }

//             // Slide in card
//             card.classList.add('show');
//         }, 300); // Wait for slide out animation
//     });
// }

// // --- SPA Navigation Logic ---
// document.addEventListener('DOMContentLoaded', () => {
//     const navLinks = document.querySelectorAll(
//         '.navbar-nav .nav-link[data-target], .navbar-brand[data-target]');
//     const initialViewId = 'home-view';

//     /**
//      * Hides all content sections and shows only the target section.
//      * @param {string} targetId - The ID of the content section to display (e.g., 'pricing-view').
//      */
//     function switchView(targetId) {
//         // 1. Hide all views and remove active state
//         document.querySelectorAll('.content-view').forEach(view => {
//             view.classList.remove('active-view');
//         });

//         // 2. Show the target view
//         const targetView = document.getElementById(targetId);
//         if (targetView) {
//             targetView.classList.add('active-view');
//         }

//         // 3. Update active link state in the navbar
//         document.querySelectorAll('.navbar-nav .nav-link').forEach(link => link.classList.remove(
//             'active'));
//         const activeLink = document.querySelector(`.navbar-nav .nav-link[data-target="${targetId}"]`);
//         if (activeLink) {
//             activeLink.classList.add('active');
//         }

//         // Scroll to top of the new view for better UX
//         window.scrollTo({
//             top: 0,
//             behavior: 'smooth'
//         });
//     }

//     // Attach click listeners to all navigation elements with a data-target
//     navLinks.forEach(link => {
//         link.addEventListener('click', (e) => {
//             e.preventDefault(); // Stop default link behavior
//             const targetId = link.getAttribute('data-target');
//             if (targetId) {
//                 switchView(targetId);
//             }
//         });
//     });

//     // Initialize pricing on load to ensure it reflects the default toggle state (Monthly)
//     togglePricing();

//     // Set the initial view on page load
//     switchView(initialViewId);
// });
//  function togglePricing() {
//         const isAnnual = document.getElementById('priceToggle').checked;
//         const cards = document.querySelectorAll('.pricing-card-wrapper');

//         cards.forEach(card => {
//             const isMonthlyCard = card.getAttribute('data-monthly') === '1';
//             // Show monthly if unchecked, show annual if checked
//             card.style.display = (isAnnual ? !isMonthlyCard : isMonthlyCard) ? 'none' : 'block';
//         });
//     }

    function togglePricing() {
        const isAnnual = document.getElementById('priceToggle').checked;
        const cards = document.querySelectorAll('.pricing-card-wrapper');

        cards.forEach(card => {
            const cycle = card.getAttribute('data-cycle'); // FIXED
            const shouldShow = isAnnual ? (cycle === 'annual') : (cycle === 'monthly');

            if (shouldShow) {
                // show smoothly
                card.style.display = 'block';
                requestAnimationFrame(() => {
                    card.classList.add('fade-in');
                    card.classList.remove('fade-out');
                });
            } else {
                card.classList.add('fade-out');
                card.classList.remove('fade-in');
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }

