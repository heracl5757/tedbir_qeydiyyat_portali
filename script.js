// Form göndərilməzdən əvvəl yoxlanış və bildiriş funksiyası
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const ad = document.getElementById('ad').value;
    const tedbirSelect = document.getElementById('tedbir');
    const tedbirAdi = tedbirSelect.options[tedbirSelect.selectedIndex].text;

    // İstifadəçiyə qısa bir təsdiq mesajı (alert) göstəririk
    console.log(`İstifadəçi qeydiyyatdan keçir: ${ad}`);
    
    // Qeyd: PHP faylına yönlənməni dayandırmırıq, 
    // sadəcə istifadəçi təcrübəsini artırırıq.
});