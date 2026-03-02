<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile | Moreno</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sidebar-bg: #2c2416;
    --sidebar-width: 240px;
    --sidebar-collapsed-width: 70px;
    --sidebar-text: rgba(255,255,255,0.65);
    --sidebar-text-hover: #fff;
    --sidebar-active-bg: #4a3728;
    --sidebar-active-text: #fff;
    --sidebar-label: rgba(255,255,255,0.3);
    --sidebar-border: rgba(255,255,255,0.06);
    --content-bg: #f0ede6;
    --card-bg: #ffffff;
    --card-border: #e8e3d8;
    --text-primary: #1a1510;
    --text-secondary: #7a7166;
    --text-muted: #9e9890;
    --accent: #7c5c3e;
    --accent-light: #e8ddd3;
    --accent-icon-bg: #ede6dc;
    --green: #3d7a52;
    --green-bg: #eaf4ee;
    --red: #9c3a3a;
    --red-bg: #fdf0f0;
    --orange: #b06a1a;
    --orange-bg: #fdf3e7;
    --blue: #2a5fa8;
    --blue-bg: #edf3fc;
    --radius: 12px;
    --t: all 0.2s ease;
  }

  body.collapsed .sidebar { width: var(--sidebar-collapsed-width); }
  body.collapsed .sidebar .brand-name,
  body.collapsed .sidebar .nav-label,
  body.collapsed .sidebar .nav-item span,
  body.collapsed .sidebar .footer-btn span { display: none; }
  body.collapsed .sidebar .nav-item,
  body.collapsed .sidebar .footer-btn { justify-content: center; padding: 12px; }
  body.collapsed .main-wrapper { margin-left: var(--sidebar-collapsed-width); }
  body.collapsed .sidebar-brand { justify-content: center; padding: 18px 0; }
  body.collapsed .sidebar-footer { padding: 12px 0; }

  body {
    font-family: 'Inter', sans-serif;
    background: var(--content-bg);
    color: var(--text-primary);
    display: flex;
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ─── SIDEBAR ─── */
  .sidebar {
    width: var(--sidebar-width);
    background: var(--sidebar-bg);
    min-height: 100vh;
    position: fixed;
    top: 0; left: 0;
    display: flex;
    flex-direction: column;
    z-index: 200;
    transition: var(--t);
  }

  .sidebar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 20px;
    border-bottom: 1px solid var(--sidebar-border);
    flex-shrink: 0;
  }

  .brand-icon {
    width: 34px; height: 34px;
    background: var(--accent);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; flex-shrink: 0;
  }

  .brand-name { font-size: 1rem; font-weight: 700; color: #fff; }

  .sidebar-nav { flex: 1; padding: 14px 10px; overflow-y: auto; }

  .nav-group { margin-bottom: 4px; }

  .nav-label {
    font-size: 0.64rem; font-weight: 600;
    letter-spacing: 1.5px; text-transform: uppercase;
    color: var(--sidebar-label);
    padding: 10px 12px 6px;
  }

  .nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 12px; border-radius: 8px;
    color: var(--sidebar-text);
    font-size: 0.875rem; font-weight: 500;
    cursor: pointer; transition: var(--t);
    border: none; background: none; width: 100%;
    text-align: left; margin-bottom: 1px;
  }

  .nav-item:hover { background: rgba(255,255,255,0.06); color: var(--sidebar-text-hover); }
  .nav-item.active { background: var(--sidebar-active-bg); color: #fff; }
  .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; opacity: 0.8; }
  .nav-item.active svg { opacity: 1; }

  .sidebar-footer {
    padding: 12px 10px 16px;
    border-top: 1px solid var(--sidebar-border);
    flex-shrink: 0;
  }

  .footer-btn {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 12px; border-radius: 8px;
    color: var(--sidebar-text);
    font-size: 0.875rem; font-weight: 500;
    cursor: pointer; transition: var(--t);
    border: none; background: none; width: 100%;
    font-family: inherit;
  }

  .footer-btn:hover { background: rgba(255,255,255,0.06); color: #fff; }
  .footer-btn svg { width: 16px; height: 16px; }

  /* ─── MAIN ─── */
  .main-wrapper {
    margin-left: var(--sidebar-width);
    flex: 1; display: flex; flex-direction: column;
    min-height: 100vh;
  }

  /* ─── TOPBAR ─── */
  .topbar {
    background: var(--content-bg);
    border-bottom: 1px solid var(--card-border);
    padding: 0 28px;
    height: 60px;
    display: flex; align-items: center; justify-content: space-between;
    position: sticky; top: 0; z-index: 100;
  }

  .topbar-left { display: flex; align-items: center; gap: 12px; }

  .topbar-info h2 { font-size: 0.95rem; font-weight: 600; }
  .topbar-info p  { font-size: 0.75rem; color: var(--text-secondary); margin-top: 1px; }

  .topbar-right { display: flex; align-items: center; gap: 6px; }

  .tb-btn {
    width: 34px; height: 34px; border-radius: 8px;
    border: none; background: none; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: var(--text-secondary); transition: var(--t); position: relative;
  }

  .tb-btn:hover { background: var(--accent-light); color: var(--text-primary); }
  .tb-btn svg { width: 17px; height: 17px; }

  .notif-pip {
    position: absolute; top: 5px; right: 5px;
    width: 7px; height: 7px;
    background: var(--red); border-radius: 50%;
    border: 1.5px solid var(--content-bg);
  }

  .avatar-btn {
    width: 34px; height: 34px; border-radius: 8px;
    background: var(--accent); border: none; cursor: pointer;
    font-size: 0.72rem; font-weight: 700; color: #fff;
    font-family: 'Inter', sans-serif; letter-spacing: 0.5px;
  }

  .mobile-hamburger {
    display: none; width: 34px; height: 34px; border-radius: 8px;
    border: none; background: none; cursor: pointer;
    align-items: center; justify-content: center; color: var(--text-secondary);
  }

  .mobile-hamburger svg { width: 20px; height: 20px; }

  /* ─── CONTENT ─── */
  .content { flex: 1; padding: 28px; }

  .page { display: none; animation: fu 0.22s ease; }
  .page.active { display: block; }

  @keyframes fu { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }

  /* ─── PAGE HEADER ─── */
  .page-header { margin-bottom: 24px; }
  .page-greeting h1 { font-size: 1.45rem; font-weight: 700; display: flex; align-items: center; gap: 8px; }
  .page-greeting p  { font-size: 0.84rem; color: var(--text-secondary); margin-top: 4px; }

  /* ─── STAT CARDS ─── */
  .stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 20px;
  }

  .stat-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--radius);
    padding: 18px;
    display: flex; align-items: flex-start; gap: 14px;
    transition: var(--t);
  }

  .stat-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.06); transform: translateY(-1px); }

  .stat-icon {
    width: 40px; height: 40px; border-radius: 10px;
    background: var(--accent-icon-bg);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .stat-icon svg { width: 18px; height: 18px; color: var(--accent); }

  .stat-label {
    font-size: 0.68rem; font-weight: 700; letter-spacing: 1px;
    text-transform: uppercase; color: var(--text-muted); margin-bottom: 5px;
  }

  .stat-value { font-size: 1.55rem; font-weight: 700; line-height: 1; margin-bottom: 5px; }
  .stat-sub { font-size: 0.73rem; font-weight: 500; }

  .c-green  { color: var(--green); }
  .c-blue   { color: var(--blue); }
  .c-orange { color: var(--orange); }
  .c-muted  { color: var(--text-muted); }

  /* ─── DASHBOARD GRID ─── */
  .dash-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 14px;
  }

  .card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--radius);
    padding: 20px;
  }

  .card-head {
    display: flex; justify-content: space-between;
    align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 8px;
  }

  .card-title { font-size: 0.92rem; font-weight: 700; }
  .card-meta  { font-size: 0.76rem; color: var(--text-muted); font-weight: 500; }

  /* ─── CHART ─── */
  .chart-wrap {
    display: flex; align-items: flex-end; gap: 10px;
    height: 155px;
    padding-bottom: 26px;
    position: relative;
  }

  .chart-wrap::after {
    content: '';
    position: absolute; bottom: 20px; left: 0; right: 0;
    height: 1px; background: var(--card-border);
  }

  .bar-col {
    flex: 1; display: flex; flex-direction: column;
    align-items: center; gap: 5px; height: 100%; justify-content: flex-end;
  }

  .bar-tip {
    font-size: 0.63rem; font-weight: 600;
    color: var(--text-muted); opacity: 0; transition: opacity 0.15s;
  }

  .bar-col:hover .bar-tip { opacity: 1; }

  .bar {
    width: 100%; border-radius: 5px 5px 0 0;
    background: linear-gradient(180deg, #a07650 0%, #7c5c3e 100%);
    transition: var(--t); cursor: pointer; min-height: 4px; position: relative;
  }

  .bar:hover { background: linear-gradient(180deg, #b5885e 0%, #8c6848 100%); }

  .bar-lbl {
    font-size: 0.68rem; color: var(--text-muted); font-weight: 500;
    position: absolute; bottom: -20px; left: 50%;
    transform: translateX(-50%); white-space: nowrap;
  }

  /* ─── ACTIVITY ─── */
  .activity-list { display: flex; flex-direction: column; gap: 1px; }

  .act-item {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 11px 10px; border-radius: 8px; transition: var(--t);
  }

  .act-item:hover { background: #faf8f4; }

  .act-dot {
    width: 8px; height: 8px; border-radius: 50%;
    margin-top: 5px; flex-shrink: 0;
  }

  .dot-g { background: var(--green); }
  .dot-b { background: var(--blue); }
  .dot-o { background: var(--orange); }
  .dot-r { background: var(--red); }
  .dot-m { background: var(--text-muted); }

  .act-body h4 { font-size: 0.84rem; font-weight: 600; margin-bottom: 2px; line-height: 1.4; }
  .act-body p  { font-size: 0.73rem; color: var(--text-muted); }

  /* ─── SECTION HEADER ─── */
  .sec-header {
    display: flex; justify-content: space-between; align-items: flex-start;
    margin-bottom: 18px; flex-wrap: wrap; gap: 12px;
  }

  .sec-title { font-size: 1.05rem; font-weight: 700; }
  .sec-sub   { font-size: 0.78rem; color: var(--text-secondary); margin-top: 2px; }

  .sec-actions { display: flex; gap: 8px; align-items: center; flex-wrap: wrap; }

  /* ─── BUTTONS ─── */
  .btn {
    padding: 8px 14px; border-radius: 8px; border: none;
    font-family: inherit; font-size: 0.8rem; font-weight: 600;
    cursor: pointer; transition: var(--t);
    display: inline-flex; align-items: center; gap: 6px;
  }

  .btn-primary { background: var(--accent); color: #fff; }
  .btn-primary:hover { background: #6a4d33; }
  .btn-outline { background: var(--card-bg); color: var(--text-primary); border: 1px solid var(--card-border); }
  .btn-outline:hover { border-color: var(--accent); color: var(--accent); }

  /* ─── SELECT ─── */
  .filter-sel {
    padding: 7px 12px; border: 1px solid var(--card-border);
    border-radius: 8px; background: var(--card-bg);
    font-family: inherit; font-size: 0.8rem; font-weight: 500;
    color: var(--text-primary); cursor: pointer; outline: none; transition: var(--t);
  }

  .filter-sel:focus { border-color: var(--accent); }

  /* ─── TABLE ─── */
  .table-wrap {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--radius);
    overflow: hidden;
  }

  .table-wrap table { width: 100%; border-collapse: collapse; }

  .table-wrap thead tr {
    background: #faf8f4;
    border-bottom: 1px solid var(--card-border);
  }

  .table-wrap th {
    padding: 11px 15px; text-align: left;
    font-size: 0.68rem; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase; color: var(--text-muted);
    white-space: nowrap;
  }

  .table-wrap td {
    padding: 14px 15px; font-size: 0.845rem;
    border-bottom: 1px solid #f5f2ec; vertical-align: middle;
  }

  .table-wrap tbody tr:last-child td { border-bottom: none; }
  .table-wrap tbody tr:hover td { background: #fdfcf9; }

  .ord-id { font-weight: 700; font-size: 0.78rem; color: var(--accent); }

  .badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 9px; border-radius: 20px;
    font-size: 0.7rem; font-weight: 700; white-space: nowrap;
  }

  .badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: currentColor; opacity: 0.7; }

  .bd   { background: var(--green-bg);  color: var(--green); }
  .bs   { background: var(--blue-bg);   color: var(--blue); }
  .bp   { background: var(--orange-bg); color: var(--orange); }
  .bc   { background: var(--red-bg);    color: var(--red); }
  .bpnd { background: #f4f0fc;          color: #5b3fa8; }

  .act-btn {
    padding: 5px 11px; border-radius: 6px;
    border: 1px solid var(--card-border); background: none;
    font-family: inherit; font-size: 0.76rem; font-weight: 600;
    color: var(--text-secondary); cursor: pointer; transition: var(--t);
  }

  .act-btn:hover { background: var(--accent-light); color: var(--accent); border-color: var(--accent); }

  .empty-td { text-align: center; padding: 50px; color: var(--text-muted); font-size: 0.875rem; }

  /* ─── MODAL ─── */
  .modal-bg {
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.38);
    z-index: 500; display: none;
    align-items: center; justify-content: center;
    padding: 20px; backdrop-filter: blur(3px);
  }

  .modal-bg.open { display: flex; }

  .modal {
    background: #fff; border-radius: 16px;
    width: 100%; max-width: 540px;
    max-height: 90vh; overflow-y: auto;
    padding: 26px; position: relative;
    animation: fu 0.2s ease;
  }

  .modal-x {
    position: absolute; top: 18px; right: 18px;
    width: 28px; height: 28px; border-radius: 6px;
    border: none; background: none; cursor: pointer;
    font-size: 1.1rem; color: var(--text-muted);
    display: flex; align-items: center; justify-content: center;
    transition: var(--t);
  }

  .modal-x:hover { background: var(--accent-light); color: var(--text-primary); }

  .modal-title { font-size: 1.05rem; font-weight: 700; margin-bottom: 3px; }
  .modal-date  { font-size: 0.78rem; color: var(--text-muted); margin-bottom: 20px; }

  .modal-items { border-top: 1px solid var(--card-border); }

  .modal-row {
    display: flex; justify-content: space-between;
    align-items: center; padding: 11px 0;
    border-bottom: 1px solid var(--card-border);
    font-size: 0.855rem; gap: 10px;
  }

  .modal-row span:last-child { font-weight: 600; white-space: nowrap; }

  .modal-totals { padding-top: 4px; }

  .total-row {
    display: flex; justify-content: space-between;
    padding: 7px 0; font-size: 0.855rem; color: var(--text-secondary);
  }

  .total-row.grand {
    border-top: 1px solid var(--card-border);
    margin-top: 4px; padding-top: 12px;
    font-size: 0.98rem; font-weight: 700;
    color: var(--text-primary);
  }

  /* Timeline */
  .timeline { margin-top: 20px; padding-left: 20px; position: relative; }

  .timeline::before {
    content: ''; position: absolute;
    left: 4px; top: 6px; bottom: 6px;
    width: 2px; background: var(--card-border);
  }

  .tl { position: relative; margin-bottom: 15px; }

  .tl-dot {
    position: absolute; left: -18px; top: 4px;
    width: 10px; height: 10px; border-radius: 50%;
    background: var(--card-border);
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px var(--card-border);
  }

  .tl.done .tl-dot { background: var(--accent); box-shadow: 0 0 0 1px var(--accent); }

  .tl h5 { font-size: 0.84rem; font-weight: 600; margin-bottom: 2px; }
  .tl p  { font-size: 0.73rem; color: var(--text-muted); }

  /* ─── REVIEWS ─── */
  .review-form-wrap {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--radius);
    padding: 20px; margin-bottom: 14px;
    display: none;
  }

  .review-form-wrap.open { display: block; animation: fu 0.2s ease; }

  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }

  .form-group { display: flex; flex-direction: column; }

  .flabel {
    font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;
    text-transform: uppercase; color: var(--text-muted); margin-bottom: 6px;
  }

  .finput {
    padding: 9px 13px; border: 1px solid var(--card-border);
    border-radius: 8px; font-family: inherit; font-size: 0.875rem;
    color: var(--text-primary); background: #fff; outline: none; transition: var(--t);
  }

  .finput:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(124,92,62,0.1); }

  .star-row { display: flex; gap: 5px; margin-bottom: 14px; }
  .star { font-size: 1.35rem; cursor: pointer; color: #d4c9bc; transition: color 0.12s; }
  .star.on { color: #c9912a; }

  .form-footer { display: flex; gap: 8px; margin-top: 4px; }

  .reviews-stack { display: flex; flex-direction: column; gap: 10px; }

  .rv-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--radius); padding: 18px;
    transition: var(--t);
  }

  .rv-card:hover { box-shadow: 0 4px 14px rgba(0,0,0,0.05); }

  .rv-top {
    display: flex; justify-content: space-between;
    align-items: flex-start; margin-bottom: 8px; flex-wrap: wrap; gap: 8px;
  }

  .rv-product { font-size: 0.92rem; font-weight: 700; }
  .rv-date    { font-size: 0.73rem; color: var(--text-muted); margin-top: 2px; }
  .rv-stars   { font-size: 0.88rem; color: #c9912a; letter-spacing: 1px; }
  .rv-text    { font-size: 0.855rem; color: var(--text-secondary); line-height: 1.6; }
  .rv-actions { display: flex; gap: 8px; margin-top: 12px; }

  /* ─── TOAST ─── */
  .toast {
    position: fixed; bottom: 22px; right: 22px;
    background: var(--sidebar-bg); color: #fff;
    padding: 11px 18px; border-radius: 10px;
    font-size: 0.84rem; font-weight: 500;
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
    transform: translateY(80px); opacity: 0;
    transition: all 0.28s ease; z-index: 1000; max-width: 300px;
  }

  .toast.show { transform: translateY(0); opacity: 1; }
  .toast.ok  { background: var(--green); }
  .toast.err { background: var(--red); }

  /* ─── OVERLAY ─── */
  .sidebar-overlay {
    display: none; position: fixed; inset: 0;
    background: rgba(0,0,0,0.45); z-index: 150;
  }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 1080px) {
    .stat-grid { grid-template-columns: repeat(2, 1fr); }
    .dash-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); }
    .sidebar.open { transform: translateX(0); }
    .sidebar-overlay.show { display: block; }
    .main-wrapper { margin-left: 0; }
    .mobile-hamburger { display: flex; }
    .content { padding: 18px; }
    .topbar { padding: 0 18px; }
    .form-row { grid-template-columns: 1fr; }
  }

  @media (max-width: 520px) {
    .stat-grid { grid-template-columns: 1fr 1fr; }
    .stat-value { font-size: 1.3rem; }
  }

  @media (max-width: 400px) {
    .stat-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon">👕</div>
    <span class="brand-name">My Profile</span>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-group">
      <div class="nav-label">Main</div>
      <button class="nav-item active" data-page="dashboard">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span>Dashboard</span>
      </button>
      <button class="nav-item" data-page="orders">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <span>Orders</span>
      </button>
    </div>

    <div class="nav-group">
      <div class="nav-label">Feedback</div>
      <button class="nav-item" data-page="reviews">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.382-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        <span>Reviews</span>
      </button>
    </div>

    <div class="nav-group">
      <div class="nav-label">Account</div>
      <button class="nav-item" data-page="settings">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span>Settings</span>
      </button>
    </div>
  </nav>

  <div class="sidebar-footer">
    <button class="footer-btn" id="logoutBtn">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
      <span>Log out</span>
    </button>
    <button class="footer-btn" id="collapseBtn">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
      <span>Collapse</span>
    </button>
  </div>
</aside>

<!-- Main -->
<div class="main-wrapper">

  <header class="topbar">
    <div class="topbar-left">
      <button class="mobile-hamburger" id="mobileMenuBtn">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <div class="topbar-info">
        <h2 id="topTitle">Dashboard Overview</h2>
        <p id="topSub">Welcome back — here's your account at a glance</p>
      </div>
    </div>
    <div class="topbar-right">
      <button class="tb-btn" title="Orders" onclick="goTo('orders')">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <span class="notif-pip" id="ordPip" style="display:none"></span>
      </button>
      <button class="tb-btn" title="Back to store" onclick="window.location.href='index.php'">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
      </button>
      <button class="avatar-btn" id="avatarBtn">U</button>
    </div>
  </header>

  <div class="content">

    <!-- ══ DASHBOARD ══ -->
    <div class="page active" id="page-dashboard">

      <div class="page-header">
        <div class="page-greeting">
          <h1 id="greeting">Welcome 👋</h1>
          <p>Here's what's happening with your account today.</p>
        </div>
      </div>

      <div class="stat-grid">
        <div class="stat-card">
          <div class="stat-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <div class="stat-label">Total Spent</div>
            <div class="stat-value" id="sSpent">$0.00</div>
            <div class="stat-sub c-green" id="sSpentSub">From all orders</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
          </div>
          <div>
            <div class="stat-label">Total Orders</div>
            <div class="stat-value" id="sOrders">0</div>
            <div class="stat-sub c-blue" id="sOrdersSub">0 active right now</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          </div>
          <div>
            <div class="stat-label">Avg. Order Value</div>
            <div class="stat-value" id="sAvg">$0.00</div>
            <div class="stat-sub c-muted">Per order</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <div class="stat-label">Completed</div>
            <div class="stat-value" id="sDone">0</div>
            <div class="stat-sub c-green" id="sDoneSub">Delivered orders</div>
          </div>
        </div>
      </div>

      <div class="dash-grid">
        <!-- Chart -->
        <div class="card">
          <div class="card-head">
            <span class="card-title">Monthly Spending</span>
            <span class="card-meta">Last 6 months</span>
          </div>
          <div class="chart-wrap" id="chartWrap"></div>
        </div>

        <!-- Activity -->
        <div class="card">
          <div class="card-head">
            <span class="card-title">Recent Activity</span>
            <button class="btn btn-outline" style="font-size:0.73rem;padding:5px 10px;" onclick="goTo('orders')">View all</button>
          </div>
          <div class="activity-list" id="activityList"></div>
        </div>
      </div>
    </div>

    <!-- ══ ORDERS ══ -->
    <div class="page" id="page-orders">
      <div class="sec-header">
        <div>
          <div class="sec-title">My Orders</div>
          <div class="sec-sub" id="ordSub">All your purchases</div>
        </div>
        <div class="sec-actions">
          <select class="filter-sel" id="ordFilter">
            <option value="all">All Orders</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
          </select>
          <button class="btn btn-outline" id="exportBtn">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Export
          </button>
        </div>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Items</th>
              <th>Total</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="ordTbody"></tbody>
        </table>
      </div>
    </div>

    <!-- ══ REVIEWS ══ -->
    <div class="page" id="page-reviews">
      <div class="sec-header">
        <div>
          <div class="sec-title">My Reviews</div>
          <div class="sec-sub" id="rvSub">Your product feedback</div>
        </div>
        <button class="btn btn-primary" id="writeRvBtn">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Write a Review
        </button>
      </div>

      <!-- Review Form -->
      <div class="review-form-wrap" id="rvFormWrap">
        <div style="font-size:0.88rem;font-weight:700;margin-bottom:15px;" id="rvFormTitle">New Review</div>
        <div class="form-row">
          <div class="form-group">
            <label class="flabel">Product Name</label>
            <input type="text" class="finput" id="rvProd" placeholder="e.g. Wool Blazer">
          </div>
          <div class="form-group">
            <label class="flabel">Purchase Date</label>
            <input type="date" class="finput" id="rvDate">
          </div>
        </div>
        <label class="flabel">Rating</label>
        <div class="star-row" id="starRow">
          <span class="star" data-v="1">★</span>
          <span class="star" data-v="2">★</span>
          <span class="star" data-v="3">★</span>
          <span class="star" data-v="4">★</span>
          <span class="star" data-v="5">★</span>
        </div>
        <label class="flabel">Your Review</label>
        <textarea class="finput" id="rvText" rows="3" placeholder="Share your experience with this product..." style="resize:vertical;"></textarea>
        <div class="form-footer" style="margin-top:12px;">
          <button class="btn btn-primary" id="submitRvBtn">Post Review</button>
          <button class="btn btn-outline" id="cancelRvBtn">Cancel</button>
        </div>
      </div>

      <div class="reviews-stack" id="rvStack"></div>
    </div>

    <!-- ══ SETTINGS ══ -->
    <div class="page" id="page-settings">
      <div class="sec-header">
        <div>
          <div class="sec-title">Account Settings</div>
          <div class="sec-sub">Manage your profile information and security</div>
        </div>
      </div>

      <div class="dash-grid">
        <div class="card">
          <div class="card-head">
            <span class="card-title">Profile Information</span>
          </div>
          <div class="form-group" style="margin-bottom:15px;">
            <label class="flabel">Full Name</label>
            <input type="text" class="finput" id="setFullName" placeholder="Your Name">
          </div>
          <div class="form-group" style="margin-bottom:20px;">
            <label class="flabel">Email Address</label>
            <input type="email" class="finput" id="setEmail" placeholder="your@email.com">
          </div>
          <button class="btn btn-primary" id="saveProfileBtn">Update Profile</button>
        </div>

        <div class="card">
          <div class="card-head">
            <span class="card-title">Security</span>
          </div>
          <div class="form-group" style="margin-bottom:15px;">
            <label class="flabel">New Password</label>
            <input type="password" class="finput" id="setPass" placeholder="••••••••">
          </div>
          <div class="form-group" style="margin-bottom:20px;">
            <label class="flabel">Confirm Password</label>
            <input type="password" class="finput" id="setPassConfirm" placeholder="••••••••">
          </div>
          <button class="btn btn-primary" id="savePassBtn">Change Password</button>
        </div>
      </div>

      <div class="card" style="margin-top:20px; border-color:rgba(156,58,58,0.3); background:#fffaf9;">
        <div class="card-head">
          <span class="card-title" style="color:var(--red)">Danger Zone</span>
        </div>
        <p style="font-size:0.84rem; color:var(--text-secondary); margin-bottom:15px;">
          Deleting your account is permanent. All your data, including order history and reviews, will be removed.
        </p>
        <button class="btn btn-outline" id="deleteAccBtn" style="color:var(--red); border-color:var(--red)">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="13"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
          Delete My Account
        </button>
      </div>
    </div>

  </div>
</div>

<!-- Order Modal -->
<div class="modal-bg" id="ordModal">
  <div class="modal">
    <button class="modal-x" id="closeModal">&times;</button>
    <div class="modal-title" id="mTitle"></div>
    <div class="modal-date"  id="mDate"></div>
    <div id="mBody"></div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
const $ = id => document.getElementById(id);
const gl = (k, d) => { try { return JSON.parse(localStorage.getItem(k)) || d; } catch { return d; } };
const sl = (k, v) => localStorage.setItem(k, JSON.stringify(v));

let toastT;
const toast = (msg, type = '') => {
  const el = $('toast');
  el.textContent = msg;
  el.className = 'toast show' + (type ? ' ' + type : '');
  clearTimeout(toastT);
  toastT = setTimeout(() => el.classList.remove('show'), 3000);
};

// ── INIT ─────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  if (localStorage.getItem('isLoggedIn') !== 'true') {
    window.location.href = 'login.php?redirect=profile.php';
    return;
  }
  const p = gl('userProfile', {});
  if (p.initials) $('avatarBtn').textContent = p.initials;
  const name = (p.name || 'User').split(' ')[0];
  const h = new Date().getHours();
  $('greeting').textContent = `${h < 12 ? 'Good morning' : h < 18 ? 'Good afternoon' : 'Good evening'}, ${name} 👋`;

  renderDash();
  renderOrders(gl('orders', []));
  renderReviews(gl('reviews', []));
  setupNav();
  setupSidebar();
  setupOrders();
  setupReviews();
  setupSettings();

  const hash = location.hash.replace('#','');
  if (hash && $(`page-${hash}`)) goTo(hash);
});

// ── DASHBOARD ─────────────────────────────────────────
function renderDash() {
  const orders = gl('orders', []);
  const total  = orders.reduce((s, o) => s + (parseFloat(o.total) || 0), 0);
  const active = orders.filter(o => ['pending','processing','shipped'].includes((o.status||'').toLowerCase())).length;
  const done   = orders.filter(o => (o.status||'').toLowerCase() === 'delivered').length;
  const avg    = orders.length ? total / orders.length : 0;

  $('sSpent').textContent   = '$' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  $('sSpentSub').textContent = `From ${orders.length} order${orders.length !== 1 ? 's' : ''}`;
  $('sOrders').textContent  = orders.length;
  $('sOrdersSub').textContent = `${active} active right now`;
  $('sAvg').textContent     = '$' + avg.toFixed(2);
  $('sDone').textContent    = done;
  $('sDoneSub').textContent = `${done} delivered order${done !== 1 ? 's' : ''}`;

  if (active > 0) $('ordPip').style.display = 'block';

  // Chart
  const months = ['Oct','Nov','Dec','Jan','Feb','Mar'];
  const buckets = months.map((lbl, i) => {
    const d = new Date();
    d.setMonth(d.getMonth() - (5 - i));
    const key = `${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}`;
    const v = orders.filter(o => o.date && o.date.startsWith(key)).reduce((s,o) => s+(parseFloat(o.total)||0), 0);
    return { lbl, v };
  });
  const mx = Math.max(...buckets.map(b => b.v), 1);
  $('chartWrap').innerHTML = buckets.map(b => {
    const h = Math.max(4, (b.v / mx) * 100);
    return `<div class="bar-col">
      <div class="bar-tip">${b.v > 0 ? '$'+b.v.toFixed(0) : '$0'}</div>
      <div class="bar" style="height:${h}%"><span class="bar-lbl">${b.lbl}</span></div>
    </div>`;
  }).join('');

  // Activity
  const dotMap = { Delivered: 'dot-g', Shipped: 'dot-b', Processing: 'dot-o', Pending: 'dot-p', Cancelled: 'dot-r' };
  const sorted = [...orders].sort((a,b) => new Date(b.date)-new Date(a.date)).slice(0,5);
  $('activityList').innerHTML = sorted.length
    ? sorted.map(o => `<div class="act-item">
        <div class="act-dot ${dotMap[o.status]||'dot-m'}"></div>
        <div class="act-body"><h4>Order ${o.id} — ${o.status}</h4><p>${o.date}</p></div>
      </div>`).join('')
    : '<div style="padding:16px;text-align:center;color:var(--text-muted);font-size:0.84rem;">No recent activity.</div>';
}

// ── ORDERS ────────────────────────────────────────────
function renderOrders(orders) {
  $('ordSub').textContent = `${orders.length} order${orders.length !== 1 ? 's' : ''} total`;
  const bMap = { delivered:'bd', shipped:'bs', processing:'bp', cancelled:'bc', pending:'bpnd' };
  $('ordTbody').innerHTML = !orders.length
    ? `<tr><td colspan="6" class="empty-td">No orders found.</td></tr>`
    : orders.map(o => {
        const s = (o.status||'processing').toLowerCase();
        return `<tr>
          <td><span class="ord-id">${o.id}</span></td>
          <td>${o.date||'—'}</td>
          <td style="color:var(--text-muted)">${(o.items||[]).length} item${(o.items||[]).length!==1?'s':''}</td>
          <td style="font-weight:700">$${(parseFloat(o.total)||0).toFixed(2)}</td>
          <td><span class="badge ${bMap[s]||'bp'}">${o.status||'Processing'}</span></td>
          <td>
            <div style="display:flex;gap:6px;justify-content:flex-end;flex-wrap:wrap;">
              <button class="act-btn vbtn" data-id="${o.id}">View</button>
              ${s==='delivered'?`<button class="act-btn review-order-btn" data-id="${o.id}">Review Items</button>`:''}
            </div>
          </td>
        </tr>`;
      }).join('');

  document.querySelectorAll('.vbtn').forEach(b => b.addEventListener('click', () => openModal(b.dataset.id)));
  document.querySelectorAll('.review-order-btn').forEach(b => b.addEventListener('click', () => {
    const o = gl('orders', []).find(x => x.id === b.dataset.id);
    if (o && o.items && o.items.length > 0) {
      // Pre-fill review form with the first item
      $('rvProd').value = o.items[0].n;
      goTo('reviews');
      openForm();
      $('rvFormWrap').scrollIntoView({ behavior:'smooth', block:'start' });
    }
  }));
}

function setupOrders() {
  $('ordFilter').addEventListener('change', e => {
    const v = e.target.value, all = gl('orders', []);
    renderOrders(v === 'all' ? all : all.filter(o => (o.status||'').toLowerCase() === v));
  });
  $('exportBtn').addEventListener('click', () => {
    const orders = gl('orders', []);
    if (!orders.length) return toast('No orders to export');
    const csv = ['ID,Date,Items,Total,Status', ...orders.map(o => `${o.id},${o.date},${(o.items||[]).length},$${o.total},${o.status}`)].join('\n');
    const a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob([csv], { type: 'text/csv' }));
    a.download = 'my-orders.csv'; a.click();
    toast('Exported!', 'ok');
  });
}

// ── MODAL ─────────────────────────────────────────────
function openModal(id) {
  const o = gl('orders', []).find(x => x.id === id);
  if (!o) return;
  $('mTitle').textContent = `Order ${o.id}`;
  $('mDate').textContent  = `Placed on ${o.date || 'N/A'}`;
  const s = (o.status||'').toLowerCase();
  const done = s => ['pending','processing','shipped','delivered'].includes(s);
  $('mBody').innerHTML = `
    <div class="modal-items">
      ${(o.items||[]).map(i => `
        <div class="modal-row">
          <span>${i.n} <span style="color:var(--text-muted)">× ${i.q}</span></span>
          <span>$${(i.p * i.q).toFixed(2)}</span>
        </div>`).join('')}
    </div>
    <div class="modal-totals">
      <div class="total-row"><span>Subtotal</span><span>$${(parseFloat(o.total)||0).toFixed(2)}</span></div>
      <div class="total-row"><span>Shipping</span><span style="color:var(--green)">Free</span></div>
      <div class="total-row grand"><span>Total</span><span>$${(parseFloat(o.total)||0).toFixed(2)}</span></div>
    </div>
    <div class="timeline">
      <div class="tl done"><div class="tl-dot"></div><h5>Order Placed</h5><p>${o.date}</p></div>
      <div class="tl ${done(s)?'done':''}"><div class="tl-dot"></div><h5>Processing</h5><p>Preparing your order</p></div>
      <div class="tl ${['shipped','delivered'].includes(s)?'done':''}"><div class="tl-dot"></div><h5>Shipped</h5><p>On its way to you</p></div>
      <div class="tl ${s==='delivered'?'done':''}"><div class="tl-dot"></div><h5>Delivered</h5><p>Package delivered</p></div>
    </div>`;
  $('ordModal').classList.add('open');
}

$('closeModal').addEventListener('click', () => $('ordModal').classList.remove('open'));
$('ordModal').addEventListener('click', e => { if (e.target === $('ordModal')) $('ordModal').classList.remove('open'); });

// ── REVIEWS ───────────────────────────────────────────
let curRating = 0, editId = null;

function renderReviews(reviews) {
  $('rvSub').textContent = `${reviews.length} review${reviews.length !== 1 ? 's' : ''} written`;
  $('rvStack').innerHTML = !reviews.length
    ? `<div style="background:var(--card-bg);border:1px solid var(--card-border);border-radius:var(--radius);padding:40px;text-align:center;color:var(--text-muted);font-size:0.875rem;">You haven't reviewed any products yet.</div>`
    : reviews.map(r => `
      <div class="rv-card">
        <div class="rv-top">
          <div><div class="rv-product">${r.product||'Product'}</div><div class="rv-date">${r.date||''}</div></div>
          <div class="rv-stars">${'★'.repeat(r.rating||0)}${'☆'.repeat(5-(r.rating||0))}</div>
        </div>
        <div class="rv-text">${r.text||''}</div>
        <div class="rv-actions">
          <button class="act-btn edbtn" data-id="${r.id}">Edit</button>
          <button class="act-btn delbtn" data-id="${r.id}" style="color:var(--red)">Delete</button>
        </div>
      </div>`).join('');

  document.querySelectorAll('.delbtn').forEach(b => b.addEventListener('click', () => {
    if (!confirm('Delete this review?')) return;
    let rv = gl('reviews', []);
    rv = rv.filter(r => String(r.id) !== String(b.dataset.id));
    sl('reviews', rv); renderReviews(rv); toast('Review deleted');
  }));
  document.querySelectorAll('.edbtn').forEach(b => b.addEventListener('click', () => {
    const r = gl('reviews', []).find(x => String(x.id) === String(b.dataset.id));
    if (!r) return;
    editId = r.id; $('rvProd').value = r.product||''; $('rvText').value = r.text||''; $('rvDate').value = r.date||'';
    setStars(r.rating||0);
    $('rvFormTitle').textContent = 'Edit Review';
    $('submitRvBtn').textContent = 'Update Review';
    openForm();
    $('rvFormWrap').scrollIntoView({ behavior:'smooth', block:'start' });
  }));
}

function setStars(n) {
  curRating = n;
  document.querySelectorAll('#starRow .star').forEach(s => s.classList.toggle('on', parseInt(s.dataset.v) <= n));
}

function openForm()  { $('rvFormWrap').classList.add('open'); $('writeRvBtn').style.display = 'none'; }
function closeForm() {
  $('rvFormWrap').classList.remove('open'); $('writeRvBtn').style.display = '';
  $('rvProd').value = ''; $('rvText').value = ''; $('rvDate').value = '';
  $('rvFormTitle').textContent = 'New Review';
  $('submitRvBtn').textContent = 'Post Review';
  editId = null; setStars(0);
}

function setupReviews() {
  $('writeRvBtn').addEventListener('click', () => { editId = null; openForm(); });
  $('cancelRvBtn').addEventListener('click', closeForm);
  document.querySelectorAll('#starRow .star').forEach(s => s.addEventListener('click', () => setStars(parseInt(s.dataset.v))));
  $('submitRvBtn').addEventListener('click', () => {
    const prod = $('rvProd').value.trim();
    const text = $('rvText').value.trim();
    if (!prod) return toast('Please enter a product name');
    if (!curRating) return toast('Please select a rating');
    if (!text) return toast('Please write a comment');
    let rv = gl('reviews', []);
    if (editId) {
      const idx = rv.findIndex(r => String(r.id) === String(editId));
      if (idx !== -1) rv[idx] = { ...rv[idx], product: prod, text, rating: curRating, date: $('rvDate').value || rv[idx].date };
    } else {
      rv.unshift({ id: Date.now(), product: prod, text, rating: curRating, date: $('rvDate').value || new Date().toISOString().split('T')[0] });
    }
    sl('reviews', rv); renderReviews(rv); closeForm();
    toast(editId ? 'Review updated' : 'Review posted!', 'ok');
  });
}

// ── NAVIGATION ────────────────────────────────────────
const pages = {
  dashboard: { title: 'Profile Overview', sub: 'Your account at a glance' },
  orders:    { title: 'My Orders',        sub: 'Track and manage your purchases' },
  reviews:   { title: 'My Reviews',       sub: 'Your product feedback' },
  settings:  { title: 'Settings',         sub: 'Account and security preferences' },
};

function goTo(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item[data-page]').forEach(n => n.classList.remove('active'));
  const pg = $(`page-${id}`), nv = document.querySelector(`.nav-item[data-page="${id}"]`);
  if (pg) pg.classList.add('active');
  if (nv) nv.classList.add('active');
  const cfg = pages[id] || {};
  $('topTitle').textContent = cfg.title || '';
  $('topSub').textContent   = cfg.sub   || '';
  history.pushState(null, '', `#${id}`);
  window.scrollTo({ top: 0, behavior: 'smooth' });
  $('sidebar').classList.remove('open');
  $('sidebarOverlay').classList.remove('show');
}

function setupNav() {
  document.querySelectorAll('.nav-item[data-page]').forEach(b => b.addEventListener('click', () => goTo(b.dataset.page)));
}

// ── SIDEBAR ───────────────────────────────────────────
function setupSidebar() {
  $('mobileMenuBtn').addEventListener('click', () => {
    $('sidebar').classList.toggle('open');
    $('sidebarOverlay').classList.toggle('show');
  });
  $('sidebarOverlay').addEventListener('click', () => {
    $('sidebar').classList.remove('open');
    $('sidebarOverlay').classList.remove('show');
  });
  $('logoutBtn').addEventListener('click', () => {
    localStorage.removeItem('isLoggedIn');
    window.location.href = 'index.php';
  });
  $('collapseBtn').addEventListener('click', () => {
    if (window.innerWidth <= 768) {
      $('sidebar').classList.remove('open');
      $('sidebarOverlay').classList.remove('show');
    } else {
      const isCollapsed = document.body.classList.toggle('collapsed');
      $('collapseBtn').querySelector('span').textContent = isCollapsed ? 'Expand' : 'Collapse';
      $('collapseBtn').querySelector('svg').style.transform = isCollapsed ? 'rotate(180deg)' : '';
    }
  });

  // Remove manual reviews (IDs 1 and 2) if they exist in localStorage
  let rv = gl('reviews', []);
  const initialCount = rv.length;
  rv = rv.filter(r => r.id !== 1 && r.id !== 2);
  if (rv.length !== initialCount) {
    sl('reviews', rv);
    renderReviews(rv);
  }
}

function setupSettings() {
  const p = gl('userProfile', {});
  $('setFullName').value = p.name || '';
  $('setEmail').value = p.email || '';

  $('saveProfileBtn').addEventListener('click', () => {
    const name = $('setFullName').value.trim();
    const email = $('setEmail').value.trim();
    if (!name || !email) return toast('Name and Email are required', 'err');

    const profile = gl('userProfile', {});
    profile.name = name;
    profile.email = email;
    profile.initials = name.split(' ').map(n => n[0]).join('').toUpperCase().slice(0, 2);
    
    sl('userProfile', profile);
    
    // Update UI immediately
    $('avatarBtn').textContent = profile.initials;
    const h = new Date().getHours();
    $('greeting').textContent = `${h < 12 ? 'Good morning' : h < 18 ? 'Good afternoon' : 'Good evening'}, ${name.split(' ')[0]} 👋`;
    
    toast('Profile updated successfully', 'ok');
  });

  $('savePassBtn').addEventListener('click', () => {
    const pass = $('setPass').value;
    const conf = $('setPassConfirm').value;
    if (!pass) return toast('Please enter a new password', 'err');
    if (pass !== conf) return toast('Passwords do not match', 'err');

    const profile = gl('userProfile', {});
    profile.password = pass; // In a real app, this would be hashed on server
    sl('userProfile', profile);
    
    $('setPass').value = '';
    $('setPassConfirm').value = '';
    toast('Password changed successfully', 'ok');
  });

  $('deleteAccBtn').addEventListener('click', () => {
    if (confirm('Are you absolutely sure? This will delete all your data and logout.')) {
      localStorage.clear(); // Wipe everything
      toast('Account deleted', 'err');
      setTimeout(() => window.location.href = 'index.php', 1000);
    }
  });
}
</script>
</body>
</html>
