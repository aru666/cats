import './bootstrap';
import '../css/app.css';

document.addEventListener('alpine:init', () => {
    Alpine.data('dashboard', () => ({
        sidebarOpen: true,
        quarters: [
            { name: 'Q1', amount: 3750000, difference: 200000 },
            { name: 'Q2', amount: 3750000, difference: 1200000 },
            { name: 'Q3', amount: 3750000, difference: 5200000 },
            { name: 'Q4', amount: 3750000, difference: 200000 }
        ],
        rates: [
            { name: '預估 30%', count: 57, amount: 200000 },
            { name: '預估 50%', count: 33, amount: 1200000 },
            { name: '預估 70%', count: 28, amount: 2200000 },
            { name: '預估100%', count: 27, amount: 1500000 }
        ],
        types: [
            { name: '平面代編', count: 10, amount: 200000 },
            { name: '網路內容', count: 33, amount: 1200000 },
            { name: '數位專案', count: 6, amount: 5200000 },
            { name: '專案活動', count: 1, amount: 200000 }
        ],
        formatNumber(num) {
            return num.toLocaleString()
        }
    }))
})