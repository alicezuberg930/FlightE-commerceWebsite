const bars = document.getElementById('bars');
const sidebar = document.getElementById('sidebar');
const sidebarclose = document.getElementById('sidebarClose');
bars.addEventListener('click', () => {
    sidebar.classList.add('sidebar_responsive');
});
sidebarclose.addEventListener('click', () => {
    sidebar.classList.remove('sidebar_responsive');
});