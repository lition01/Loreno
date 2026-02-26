<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atelier — Clothing Store Admin</title>
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --c1: #b39c80;
      --c2: #c6baa5;
      --c3: #a8845e;
      --c4: #7e5232;
      --c5: #2f2716;
      --bg: #f7f4f0;
      --surface: #ffffff;
      --border: #ede6dd;
      --muted: #9a8a7a;
      --text: #2f2716;
      --radius: 14px;
      --radius-sm: 9px;
      --shadow: 0 2px 12px rgba(47, 39, 22, .07);
      --shadow-md: 0 6px 28px rgba(47, 39, 22, .13);
      --sidebar-w: 240px;
      --sidebar-c: 66px;
      --topbar-h: 62px;
      --trans: .22s cubic-bezier(.4, 0, .2, 1);
    }

    html,
    body {
      height: 100%;
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background: var(--bg);
      color: var(--text);
      font-size: 14px;
      line-height: 1.55;
    }

    input,
    select,
    textarea,
    button {
      font: inherit;
    }

    button {
      cursor: pointer;
      border: none;
      background: none;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    img {
      display: block;
      max-width: 100%;
    }

    ::-webkit-scrollbar {
      width: 5px;
      height: 5px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--c2);
      border-radius: 4px;
    }

    /* SHELL */
    .shell {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    /* SIDEBAR */
    .sidebar {
      width: var(--sidebar-w);
      background: var(--c5);
      display: flex;
      flex-direction: column;
      flex-shrink: 0;
      transition: width var(--trans);
      overflow: hidden;
      z-index: 200;
    }

    .sidebar.collapsed {
      width: var(--sidebar-c);
    }

    .sb-head {
      height: var(--topbar-h);
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 0 14px;
      border-bottom: 1px solid rgba(255, 255, 255, .06);
      flex-shrink: 0;
    }

    .sb-logo {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--c3), var(--c4));
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .sb-logo svg {
      width: 19px;
      height: 19px;
      stroke: #fff;
    }

    .sb-brand {
      font-size: 15px;
      font-weight: 700;
      color: #fff;
      white-space: nowrap;
      opacity: 1;
      transition: opacity var(--trans);
    }

    .sidebar.collapsed .sb-brand {
      opacity: 0;
      pointer-events: none;
    }

    .sb-nav {
      flex: 1;
      padding: 14px 10px;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .sb-group-label {
      font-size: 9.5px;
      font-weight: 700;
      letter-spacing: 1.1px;
      text-transform: uppercase;
      color: var(--c1);
      opacity: .5;
      padding: 10px 8px 5px;
      white-space: nowrap;
      transition: opacity var(--trans);
    }

    .sidebar.collapsed .sb-group-label {
      opacity: 0;
    }

    .sb-item {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 9px 10px;
      border-radius: var(--radius-sm);
      color: rgba(255, 255, 255, .55);
      transition: background var(--trans), color var(--trans);
      white-space: nowrap;
      position: relative;
      margin-bottom: 1px;
    }

    .sb-item svg {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .sb-item .sb-label {
      font-size: 13.5px;
      font-weight: 500;
      transition: opacity var(--trans);
    }

    .sidebar.collapsed .sb-item .sb-label {
      opacity: 0;
      pointer-events: none;
    }

    .sb-item:hover {
      background: rgba(255, 255, 255, .07);
      color: #fff;
    }

    .sb-item.active {
      background: var(--c3);
      color: #fff;
    }

    .sidebar.collapsed .sb-item::after {
      content: attr(data-tip);
      position: absolute;
      left: calc(var(--sidebar-c) + 6px);
      top: 50%;
      transform: translateY(-50%);
      background: var(--c5);
      color: #fff;
      font-size: 12px;
      font-weight: 500;
      padding: 5px 11px;
      border-radius: 7px;
      white-space: nowrap;
      pointer-events: none;
      opacity: 0;
      transition: opacity .15s;
      border: 1px solid rgba(255, 255, 255, .08);
      box-shadow: var(--shadow-md);
      z-index: 300;
    }

    .sidebar.collapsed .sb-item:hover::after {
      opacity: 1;
    }

    .sb-foot {
      padding: 10px;
      border-top: 1px solid rgba(255, 255, 255, .06);
      flex-shrink: 0;
    }

    .sb-toggle {
      width: 100%;
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 9px 10px;
      border-radius: var(--radius-sm);
      color: rgba(255, 255, 255, .38);
      transition: background var(--trans), color var(--trans);
      white-space: nowrap;
    }

    .sb-toggle:hover {
      background: rgba(255, 255, 255, .07);
      color: #fff;
    }

    .sb-toggle svg {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
      transition: transform var(--trans);
    }

    .sidebar.collapsed .sb-toggle svg {
      transform: rotate(180deg);
    }

    .sb-toggle .sb-label {
      font-size: 13.5px;
      font-weight: 500;
      transition: opacity var(--trans);
    }

    .sidebar.collapsed .sb-toggle .sb-label {
      opacity: 0;
    }

    /* MAIN */
    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      min-width: 0;
    }

    .topbar {
      height: var(--topbar-h);
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 26px;
      flex-shrink: 0;
      gap: 14px;
    }

    .topbar-left {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .mob-menu-btn {
      display: none;
      width: 36px;
      height: 36px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      background: var(--bg);
      align-items: center;
      justify-content: center;
      color: var(--muted);
    }

    .mob-menu-btn svg {
      width: 17px;
      height: 17px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
    }

    .page-heading {
      font-size: 17px;
      font-weight: 700;
      color: var(--c5);
    }

    .page-sub {
      font-size: 12px;
      color: var(--muted);
      margin-top: 1px;
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .tb-icon {
      width: 36px;
      height: 36px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      background: var(--bg);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--muted);
      position: relative;
      transition: border-color var(--trans), color var(--trans);
    }

    .tb-icon:hover {
      border-color: var(--c3);
      color: var(--c3);
    }

    .tb-icon svg {
      width: 17px;
      height: 17px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .tb-dot {
      position: absolute;
      top: 6px;
      right: 6px;
      width: 7px;
      height: 7px;
      background: #d9534f;
      border-radius: 50%;
      border: 2px solid var(--surface);
    }

    .tb-avatar {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--c3), var(--c4));
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
    }

    .content {
      flex: 1;
      overflow-y: auto;
      padding: 26px;
    }

    .section {
      display: none;
    }

    .section.active {
      display: block;
      animation: fadeUp .28s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(12px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .sec-head {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 22px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .sec-title {
      font-size: 20px;
      font-weight: 700;
      color: var(--c5);
    }

    .sec-sub {
      font-size: 12.5px;
      color: var(--muted);
      margin-top: 3px;
    }

    .sec-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    /* BUTTONS */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 8px 17px;
      border-radius: var(--radius-sm);
      font-size: 13px;
      font-weight: 600;
      transition: all var(--trans);
    }

    .btn svg {
      width: 15px;
      height: 15px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .btn-primary {
      background: var(--c3);
      color: #fff;
    }

    .btn-primary:hover {
      background: var(--c4);
    }

    .btn-ghost {
      border: 1px solid var(--border);
      color: var(--muted);
    }

    .btn-ghost:hover {
      border-color: var(--c3);
      color: var(--c3);
    }

    .btn-danger {
      background: #fdeaea;
      color: #c0392b;
    }

    .btn-danger:hover {
      background: #f5c6c6;
    }

    .btn-success {
      background: #eaf6ef;
      color: #2d8a5a;
    }

    .btn-success:hover {
      background: #d0edda;
    }

    .btn-sm {
      padding: 5px 11px;
      font-size: 12px;
    }

    .btn-xs {
      padding: 3px 8px;
      font-size: 11px;
    }

    /* CARDS */
    .card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 22px;
      box-shadow: var(--shadow);
    }

    /* STAT CARDS */
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
      gap: 16px;
      margin-bottom: 22px;
    }

    .stat-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 20px;
      display: flex;
      align-items: flex-start;
      gap: 14px;
      box-shadow: var(--shadow);
      transition: box-shadow var(--trans), transform var(--trans);
    }

    .stat-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-1px);
    }

    .stat-ico {
      width: 44px;
      height: 44px;
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .stat-ico svg {
      width: 21px;
      height: 21px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .stat-ico.a {
      background: #f0e8df;
      color: var(--c3);
    }

    .stat-ico.b {
      background: #ecddd4;
      color: var(--c4);
    }

    .stat-ico.c {
      background: #f5ede3;
      color: var(--c1);
    }

    .stat-ico.d {
      background: #e8e0d6;
      color: var(--c5);
    }

    .stat-lbl {
      font-size: 11px;
      font-weight: 600;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .5px;
    }

    .stat-val {
      font-size: 24px;
      font-weight: 800;
      color: var(--c5);
      line-height: 1.2;
      margin-top: 3px;
    }

    .stat-chg {
      font-size: 11.5px;
      font-weight: 600;
      margin-top: 3px;
    }

    .stat-chg.up {
      color: #2d8a5a;
    }

    .stat-chg.dn {
      color: #c0392b;
    }

    /* TABLES */
    .tbl-wrap {
      overflow-x: auto;
    }

    .tbl-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 14px;
      flex-wrap: wrap;
      gap: 10px;
    }

    .tbl-search {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 7px 12px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      background: var(--bg);
      color: var(--muted);
      font-size: 13px;
      transition: border-color var(--trans);
    }

    .tbl-search:focus-within {
      border-color: var(--c3);
    }

    .tbl-search svg {
      width: 14px;
      height: 14px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      flex-shrink: 0;
    }

    .tbl-search input {
      border: none;
      background: none;
      outline: none;
      font-size: 13px;
      color: var(--text);
      width: 180px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
    }

    thead th {
      text-align: left;
      padding: 9px 13px;
      font-size: 10.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .6px;
      color: var(--muted);
      background: var(--bg);
      border-bottom: 1px solid var(--border);
    }

    thead th:first-child {
      border-radius: 8px 0 0 8px;
    }

    thead th:last-child {
      border-radius: 0 8px 8px 0;
    }

    tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background var(--trans);
    }

    tbody tr:last-child {
      border-bottom: none;
    }

    tbody tr:hover {
      background: #faf7f4;
    }

    tbody td {
      padding: 12px 13px;
      vertical-align: middle;
    }

    th.sortable {
      cursor: pointer;
      user-select: none;
    }

    th.sortable:hover {
      color: var(--c3);
    }

    th.sort-asc::after {
      content: ' ▲';
      font-size: 9px;
    }

    th.sort-desc::after {
      content: ' ▼';
      font-size: 9px;
    }

    /* BADGES */
    .badge {
      display: inline-flex;
      align-items: center;
      padding: 3px 9px;
      border-radius: 20px;
      font-size: 10.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .4px;
    }

    .badge.green {
      background: #eaf6ef;
      color: #2d8a5a;
    }

    .badge.orange {
      background: #fef2e6;
      color: #c9620e;
    }

    .badge.red {
      background: #fdeaea;
      color: #c0392b;
    }

    .badge.blue {
      background: #e7f1ff;
      color: #2563eb;
    }

    .badge.gray {
      background: #f0ece8;
      color: var(--muted);
    }

    /* TWO COL */
    .two-col {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    @media(max-width:860px) {
      .two-col {
        grid-template-columns: 1fr;
      }
    }

    /* PRODUCT GRID */
    .prod-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
      gap: 16px;
    }

    .prod-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: box-shadow var(--trans), transform var(--trans);
    }

    .prod-card:hover {
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .prod-thumb {
      width: 100%;
      height: 140px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 38px;
    }

    .prod-body {
      padding: 14px;
    }

    .prod-name {
      font-size: 13.5px;
      font-weight: 700;
      color: var(--c5);
      margin-bottom: 3px;
    }

    .prod-cat {
      font-size: 11.5px;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .prod-foot {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .prod-price {
      font-size: 15px;
      font-weight: 800;
      color: var(--c4);
    }

    .prod-actions {
      display: flex;
      gap: 6px;
    }

    .icon-btn {
      width: 28px;
      height: 28px;
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid var(--border);
      color: var(--muted);
      transition: all var(--trans);
    }

    .icon-btn:hover {
      border-color: var(--c3);
      color: var(--c3);
    }

    .icon-btn.del:hover {
      border-color: #d9534f;
      color: #d9534f;
    }

    .icon-btn svg {
      width: 13px;
      height: 13px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    /* FORM */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    @media(max-width:640px) {
      .form-grid {
        grid-template-columns: 1fr;
      }
    }

    .form-full {
      grid-column: 1/-1;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .form-label {
      font-size: 12px;
      font-weight: 700;
      color: var(--c5);
      text-transform: uppercase;
      letter-spacing: .5px;
    }

    .form-input,
    .form-select,
    .form-textarea {
      width: 100%;
      padding: 9px 12px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      background: var(--bg);
      color: var(--text);
      font-size: 13.5px;
      outline: none;
      transition: border-color var(--trans), box-shadow var(--trans);
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
      border-color: var(--c3);
      box-shadow: 0 0 0 3px rgba(168, 132, 94, .12);
    }

    .form-textarea {
      resize: vertical;
      min-height: 80px;
    }

    .form-select:disabled {
      opacity: .5;
      cursor: not-allowed;
    }

    .placement-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 11px 14px;
      border: 1.5px solid var(--border);
      border-radius: var(--radius-sm);
      cursor: pointer;
      transition: border-color var(--trans), background var(--trans);
      user-select: none;
    }

    .placement-row:hover {
      border-color: var(--c3);
      background: var(--bg);
    }

    .placement-row.checked {
      border-color: var(--c3);
      background: #fdf6ef;
    }

    .placement-check {
      width: 20px;
      height: 20px;
      border-radius: 6px;
      border: 2px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: all var(--trans);
    }

    .placement-row.checked .placement-check {
      background: var(--c3);
      border-color: var(--c3);
    }

    .placement-check svg {
      width: 12px;
      height: 12px;
      stroke: #fff;
      fill: none;
      stroke-width: 2.5;
      stroke-linecap: round;
      stroke-linejoin: round;
      opacity: 0;
      transition: opacity var(--trans);
    }

    .placement-row.checked .placement-check svg {
      opacity: 1;
    }

    .placement-icon {
      font-size: 20px;
      flex-shrink: 0;
    }

    .placement-label {
      font-size: 13px;
      font-weight: 600;
      color: var(--c5);
    }

    .placement-desc {
      font-size: 11px;
      color: var(--muted);
      margin-top: 1px;
    }

    .prod-card {
      cursor: pointer;
    }

    .file-zone {
      border: 2px dashed var(--border);
      border-radius: var(--radius);
      padding: 26px;
      text-align: center;
      cursor: pointer;
      transition: border-color var(--trans), background var(--trans);
    }

    .file-zone:hover {
      border-color: var(--c3);
      background: #fdf9f5;
    }

    .file-zone input {
      display: none;
    }

    .file-zone-icon {
      font-size: 28px;
      margin-bottom: 8px;
    }

    .file-zone p {
      font-size: 13px;
      color: var(--muted);
    }

    .file-zone span {
      color: var(--c3);
      font-weight: 600;
    }

    .size-table-head {
      display: grid;
      grid-template-columns: 80px 1fr 1fr 1fr 38px;
      gap: 8px;
      align-items: center;
      padding: 7px 10px;
      background: var(--bg);
      border-radius: var(--radius-sm) var(--radius-sm) 0 0;
      border: 1px solid var(--border);
      border-bottom: none;
      font-size: 10.5px;
      font-weight: 700;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .5px;
    }

    .size-row {
      display: grid;
      grid-template-columns: 80px 1fr 1fr 1fr 38px;
      gap: 8px;
      align-items: center;
      padding: 8px 10px;
      border: 1px solid var(--border);
      border-top: none;
      background: var(--surface);
    }

    .size-row:last-child {
      border-radius: 0 0 var(--radius-sm) var(--radius-sm);
    }

    .size-tag {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 4px 10px;
      border-radius: 6px;
      background: var(--c3);
      color: #fff;
      font-size: 12px;
      font-weight: 700;
    }

    .remove-size {
      width: 30px;
      height: 30px;
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #c0392b;
      background: #fdeaea;
      transition: background var(--trans);
    }

    .remove-size:hover {
      background: #f5c6c6;
    }

    .remove-size svg {
      width: 13px;
      height: 13px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.2;
      stroke-linecap: round;
    }

    .color-list {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
    }

    .color-entry {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .color-swatch {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: 2px solid var(--border);
      overflow: hidden;
      position: relative;
      cursor: pointer;
    }

    .color-swatch input[type=color] {
      width: 200%;
      height: 200%;
      border: none;
      outline: none;
      position: absolute;
      top: -25%;
      left: -25%;
      cursor: pointer;
      background: none;
      padding: 0;
    }

    .color-name-inp {
      width: 90px;
      padding: 5px 9px;
      border: 1.5px solid var(--border);
      border-radius: 7px;
      font-size: 12px;
      background: var(--bg);
      outline: none;
      transition: border-color var(--trans);
    }

    .color-name-inp:focus {
      border-color: var(--c3);
    }

    .rem-color {
      width: 24px;
      height: 24px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #c0392b;
      background: #fdeaea;
    }

    .rem-color:hover {
      background: #f5c6c6;
    }

    .rem-color svg {
      width: 11px;
      height: 11px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.5;
      stroke-linecap: round;
    }

    .add-color-btn {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      border-radius: 7px;
      border: 1.5px dashed var(--border);
      color: var(--muted);
      font-size: 12px;
      font-weight: 600;
      transition: border-color var(--trans), color var(--trans);
    }

    .add-color-btn:hover {
      border-color: var(--c3);
      color: var(--c3);
    }

    .add-color-btn svg {
      width: 13px;
      height: 13px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.2;
      stroke-linecap: round;
    }

    .gender-group {
      display: flex;
      gap: 8px;
    }

    .gender-opt {
      flex: 1;
      padding: 9px;
      border-radius: var(--radius-sm);
      border: 1.5px solid var(--border);
      text-align: center;
      font-size: 13px;
      font-weight: 600;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--trans);
    }

    .gender-opt input {
      display: none;
    }

    .gender-opt:has(input:checked) {
      border-color: var(--c3);
      background: #fdf6ef;
      color: var(--c3);
    }

    .size-picker {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 12px;
    }

    .size-pill {
      padding: 7px 14px;
      border-radius: 8px;
      border: 1.5px solid var(--border);
      font-size: 12px;
      font-weight: 700;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--trans);
      user-select: none;
    }

    .size-pill.active {
      border-color: var(--c3);
      background: var(--c3);
      color: #fff;
    }

    /* ANALYTICS */
    .analytics-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 14px;
      margin-bottom: 20px;
    }

    .an-card {
      background: var(--surface);
      border-radius: var(--radius);
      border: 1px solid var(--border);
      padding: 20px;
      text-align: center;
      box-shadow: var(--shadow);
    }

    .an-val {
      font-size: 30px;
      font-weight: 900;
      color: var(--c4);
      line-height: 1;
    }

    .an-lbl {
      font-size: 12px;
      color: var(--muted);
      margin-top: 7px;
      font-weight: 500;
    }

    .an-chg {
      font-size: 11.5px;
      font-weight: 700;
      margin-top: 4px;
      color: var(--c3);
    }

    .bar-chart {
      display: flex;
      align-items: flex-end;
      gap: 8px;
      height: 130px;
      padding: 20px 2px 0;
    }

    .bar-col {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
      height: 100%;
    }

    .bar {
      width: 100%;
      border-radius: 5px 5px 0 0;
      background: linear-gradient(to top, var(--c4), var(--c1));
      transition: opacity var(--trans);
    }

    .bar:hover {
      opacity: .75;
    }

    .bar-lbl {
      font-size: 10.5px;
      color: var(--muted);
      font-weight: 600;
    }

    .activity-item {
      display: flex;
      align-items: flex-start;
      gap: 11px;
      padding: 11px 0;
      border-bottom: 1px solid var(--border);
    }

    .activity-item:last-child {
      border-bottom: none;
    }

    .a-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      margin-top: 4px;
      flex-shrink: 0;
    }

    .a-title {
      font-size: 13px;
      font-weight: 600;
      color: var(--c5);
    }

    .a-time {
      font-size: 11.5px;
      color: var(--muted);
      margin-top: 2px;
    }

    .cust-cell {
      display: flex;
      align-items: center;
      gap: 11px;
    }

    .cust-av {
      width: 34px;
      height: 34px;
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 700;
      color: #fff;
      flex-shrink: 0;
    }

    .cust-name {
      font-size: 13px;
      font-weight: 600;
      color: var(--c5);
    }

    .cust-join {
      font-size: 11px;
      color: var(--muted);
    }

    /* MODAL */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(47, 39, 22, .6);
      backdrop-filter: blur(4px);
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      opacity: 0;
      visibility: hidden;
      transition: all .3s cubic-bezier(.4, 0, .2, 1);
    }

    .modal-overlay.open {
      opacity: 1;
      visibility: visible;
    }

    .modal {
      background: var(--surface);
      border-radius: var(--radius);
      box-shadow: 0 20px 60px rgba(47, 39, 22, .2);
      width: 100%;
      max-width: 520px;
      max-height: 90vh;
      overflow-y: auto;
      transform: scale(.9) translateY(20px);
      opacity: 0;
      transition: all .3s cubic-bezier(.34, 1.56, .64, 1);
      position: relative;
    }

    .modal-overlay.open .modal {
      transform: scale(1) translateY(0);
      opacity: 1;
    }

    .modal.modal-lg {
      max-width: 680px;
    }

    .modal.modal-sm {
      max-width: 380px;
    }

    .modal-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px 0;
    }

    .modal-title {
      font-size: 16px;
      font-weight: 800;
      color: var(--c5);
    }

    .modal-sub {
      font-size: 12px;
      color: var(--muted);
      margin-top: 3px;
    }

    .modal-close {
      width: 30px;
      height: 30px;
      border-radius: 8px;
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--muted);
      transition: all var(--trans);
      flex-shrink: 0;
    }

    .modal-close:hover {
      border-color: var(--c3);
      color: var(--c3);
    }

    .modal-close svg {
      width: 14px;
      height: 14px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.5;
      stroke-linecap: round;
    }

    .modal-body {
      padding: 20px 24px;
    }

    .modal-footer {
      padding: 0 24px 20px;
      display: flex;
      gap: 10px;
      justify-content: flex-end;
    }

    /* CONFIRM MODAL */
    .confirm-icon {
      width: 54px;
      height: 54px;
      border-radius: 14px;
      background: #fdeaea;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 14px;
    }

    .confirm-icon svg {
      width: 26px;
      height: 26px;
      stroke: #c0392b;
      fill: none;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .confirm-icon.info {
      background: #e7f1ff;
    }

    .confirm-icon.info svg {
      stroke: #2563eb;
    }

    .confirm-icon.success {
      background: #eaf6ef;
    }

    .confirm-icon.success svg {
      stroke: #2d8a5a;
    }

    /* NOTIFICATION PANEL */
    .notif-item {
      display: flex;
      align-items: flex-start;
      gap: 11px;
      padding: 12px 0;
      border-bottom: 1px solid var(--border);
    }

    .notif-item:last-child {
      border-bottom: none;
    }

    .notif-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      margin-top: 4px;
      flex-shrink: 0;
    }

    .notif-title {
      font-size: 13px;
      font-weight: 600;
      color: var(--c5);
    }

    .notif-time {
      font-size: 11.5px;
      color: var(--muted);
      margin-top: 2px;
    }

    .notif-unread .notif-title::after {
      content: '•';
      color: var(--c3);
      margin-left: 5px;
    }

    /* PROFILE */
    .profile-banner {
      height: 80px;
      background: linear-gradient(135deg, var(--c3), var(--c4));
      border-radius: var(--radius-sm) var(--radius-sm) 0 0;
      margin: -20px -24px 0;
      margin-bottom: 0;
    }

    .profile-av {
      width: 64px;
      height: 64px;
      border-radius: 16px;
      background: linear-gradient(135deg, var(--c4), var(--c5));
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 22px;
      font-weight: 800;
      border: 4px solid var(--surface);
      margin: -32px 0 0 20px;
      position: relative;
      z-index: 1;
    }

    .profile-name {
      font-size: 17px;
      font-weight: 800;
      color: var(--c5);
      margin-top: 10px;
    }

    .profile-role {
      font-size: 12px;
      color: var(--muted);
    }

    /* PAGINATION */
    .pagination {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-top: 16px;
      justify-content: flex-end;
    }

    .page-btn {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 700;
      color: var(--muted);
      cursor: pointer;
      transition: all var(--trans);
    }

    .page-btn:hover,
    .page-btn.active {
      border-color: var(--c3);
      color: var(--c3);
      background: #fdf6ef;
    }

    .page-btn svg {
      width: 13px;
      height: 13px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2.5;
      stroke-linecap: round;
    }

    .page-info {
      font-size: 12px;
      color: var(--muted);
      margin-right: 6px;
    }

    /* TOAST */
    .toast {
      position: fixed;
      bottom: 26px;
      right: 26px;
      background: var(--c5);
      color: #fff;
      padding: 13px 20px;
      border-radius: var(--radius-sm);
      font-size: 13.5px;
      font-weight: 500;
      box-shadow: var(--shadow-md);
      z-index: 1000;
      transform: translateY(80px);
      opacity: 0;
      transition: transform .3s ease, opacity .3s ease;
      display: flex;
      align-items: center;
      gap: 9px;
    }

    .toast.show {
      transform: translateY(0);
      opacity: 1;
    }

    .toast.toast-success {
      background: #2d8a5a;
    }

    .toast.toast-error {
      background: #c0392b;
    }

    .toast svg {
      width: 17px;
      height: 17px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      flex-shrink: 0;
    }

    /* MOB OVERLAY */
    .mob-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .42);
      z-index: 150;
      opacity: 0;
      transition: opacity var(--trans);
      pointer-events: none;
    }

    /* EMPTY STATE */
    .empty-state {
      text-align: center;
      padding: 40px 20px;
    }

    .empty-icon {
      font-size: 40px;
      margin-bottom: 12px;
    }

    .empty-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--c5);
      margin-bottom: 5px;
    }

    .empty-sub {
      font-size: 13px;
      color: var(--muted);
    }

    /* SETTINGS TOGGLE */
    .toggle-wrap {
      position: relative;
      width: 40px;
      height: 22px;
      flex-shrink: 0;
    }

    .toggle-wrap input {
      opacity: 0;
      width: 0;
      height: 0;
      position: absolute;
    }

    .toggle-track {
      position: absolute;
      inset: 0;
      border-radius: 22px;
      cursor: pointer;
      transition: background .2s;
    }

    .toggle-thumb {
      position: absolute;
      left: 3px;
      top: 3px;
      width: 16px;
      height: 16px;
      background: #fff;
      border-radius: 50%;
      transition: transform .2s;
      pointer-events: none;
    }

    .toggle-wrap input:checked~.toggle-track {
      background: var(--c3);
    }

    .toggle-wrap input:not(:checked)~.toggle-track {
      background: var(--border);
    }

    .toggle-wrap input:checked~.toggle-thumb {
      transform: translateX(18px);
    }

    @media(max-width:768px) {
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        transform: translateX(-100%);
        width: var(--sidebar-w) !important;
        transition: transform var(--trans);
      }

      .sidebar.mob-open {
        transform: translateX(0);
      }

      .mob-overlay {
        display: block;
      }

      .mob-overlay.active {
        opacity: 1;
        pointer-events: all;
      }

      .mob-menu-btn {
        display: flex;
      }

      .content {
        padding: 16px;
      }

      .topbar {
        padding: 0 16px;
      }

      .stat-grid {
        grid-template-columns: 1fr 1fr;
      }

      .size-table-head,
      .size-row {
        grid-template-columns: 70px 1fr 1fr 36px;
      }

      .size-table-head span:nth-child(4),
      .size-row .meas-input {
        display: none;
      }

      .tbl-search input {
        width: 120px;
      }
    }

    @media(max-width:420px) {
      .stat-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  <!-- ══ MODALS ══════════════════════════════════════════════════════════ -->

  <!-- Quick Add Modal -->
  <div class="modal-overlay" id="modal-quickadd">
    <div class="modal">
      <div class="modal-head">
        <div>
          <div class="modal-title">Quick Add</div>
          <div class="modal-sub">Add a product or order fast</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-quickadd')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          <button class="card"
            style="text-align:center;cursor:pointer;transition:all var(--trans);border:2px solid transparent;"
            onclick="closeModal('modal-quickadd');nav(document.querySelector('[data-sec=addproduct]'))"
            onmouseover="this.style.borderColor='var(--c3)'" onmouseout="this.style.borderColor='transparent'">
            <div style="font-size:28px;margin-bottom:8px;">📦</div>
            <div style="font-size:13px;font-weight:700;color:var(--c5);">New Product</div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Add to catalogue</div>
          </button>
          <button class="card"
            style="text-align:center;cursor:pointer;transition:all var(--trans);border:2px solid transparent;"
            onclick="closeModal('modal-quickadd');openNewOrder()" onmouseover="this.style.borderColor='var(--c3)'"
            onmouseout="this.style.borderColor='transparent'">
            <div style="font-size:28px;margin-bottom:8px;">🛍️</div>
            <div style="font-size:13px;font-weight:700;color:var(--c5);">New Order</div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Create manually</div>
          </button>
          <button class="card"
            style="text-align:center;cursor:pointer;transition:all var(--trans);border:2px solid transparent;"
            onclick="closeModal('modal-quickadd');openModal('modal-addcustomer')"
            onmouseover="this.style.borderColor='var(--c3)'" onmouseout="this.style.borderColor='transparent'">
            <div style="font-size:28px;margin-bottom:8px;">👤</div>
            <div style="font-size:13px;font-weight:700;color:var(--c5);">New Customer</div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Register manually</div>
          </button>
          <button class="card"
            style="text-align:center;cursor:pointer;transition:all var(--trans);border:2px solid transparent;"
            onclick="closeModal('modal-quickadd');openModal('modal-export')"
            onmouseover="this.style.borderColor='var(--c3)'" onmouseout="this.style.borderColor='transparent'">
            <div style="font-size:28px;margin-bottom:8px;">📊</div>
            <div style="font-size:13px;font-weight:700;color:var(--c5);">Export Data</div>
            <div style="font-size:11px;color:var(--muted);margin-top:3px;">Download reports</div>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Order Modal -->
  <div class="modal-overlay" id="modal-addorder">
    <div class="modal modal-lg">
      <div class="modal-head">
        <div>
          <div class="modal-title">Create New Order</div>
          <div class="modal-sub">Manually add an order to the system</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-addorder')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div class="form-grid">
          <div class="form-group"><label class="form-label">Full Name *</label><input class="form-input" id="ao-cust"
              type="text" placeholder="e.g. Sophie Walton" required /></div>
          <div class="form-group"><label class="form-label">Email Address *</label><input class="form-input"
              id="ao-email" type="email" placeholder="sophie@email.com" required /></div>
          <div class="form-group"><label class="form-label">Phone Number *</label><input class="form-input"
              id="ao-phone" type="tel" placeholder="+1 (555) 123-4567" required /></div>
          <div class="form-group"><label class="form-label">Country *</label>
            <select class="form-select" id="ao-country" required>
              <option value="">Select Country</option>
              <option value="US">United States</option>
              <option value="CA">Canada</option>
              <option value="GB">United Kingdom</option>
              <option value="AU">Australia</option>
              <option value="DE">Germany</option>
              <option value="FR">France</option>
              <option value="IT">Italy</option>
              <option value="ES">Spain</option>
              <option value="JP">Japan</option>
              <option value="CN">China</option>
            </select>
          </div>
          <div class="form-group form-full"><label class="form-label">Street Address *</label><input class="form-input"
              id="ao-address" type="text" placeholder="123 Main Street, Apt 4B" required /></div>
          <div class="form-group"><label class="form-label">City *</label><input class="form-input" id="ao-city"
              type="text" placeholder="New York" required /></div>
          <div class="form-group"><label class="form-label">ZIP / Postal Code *</label><input class="form-input"
              id="ao-zip" type="text" placeholder="10001" required /></div>

          <div class="form-group form-full" style="height:1px; background:var(--border); margin:10px 0;"></div>

          <div class="form-group"><label class="form-label">Product</label>
            <select class="form-select" id="ao-prod">
              <option value="">Select product…</option>
            </select>
          </div>
          <div class="form-group"><label class="form-label">Size</label>
            <select class="form-select" id="ao-size" disabled>
              <option value="">— select a product first —</option>
            </select>
          </div>
          <div class="form-group"><label class="form-label">Quantity</label><input class="form-input" id="ao-qty"
              type="number" min="1" value="1" /></div>
          <div class="form-group"><label class="form-label">Order Date</label><input class="form-input" id="ao-date"
              type="date" /></div>
          <div class="form-group form-full"><label class="form-label">Notes</label><textarea class="form-textarea"
              id="ao-notes" placeholder="Optional order notes…" style="min-height:60px;"></textarea></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-addorder')">Cancel</button>
        <button class="btn btn-primary" onclick="submitOrder()">
          <svg viewBox="0 0 24 24">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Create Order
        </button>
      </div>
    </div>
  </div>

  <!-- Export Modal -->
  <div class="modal-overlay" id="modal-export">
    <div class="modal modal-sm">
      <div class="modal-head">
        <div>
          <div class="modal-title">Export Data</div>
          <div class="modal-sub">Choose format and dataset</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-export')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div class="form-group" style="margin-bottom:14px;"><label class="form-label">Dataset</label>
          <select class="form-select" id="exp-dataset">
            <option>Orders</option>
            <option>Customers</option>
            <option>Products</option>
            <option>Analytics Report</option>
          </select>
        </div>
        <div class="form-group" style="margin-bottom:14px;"><label class="form-label">Format</label>
          <select class="form-select" id="exp-format">
            <option>CSV (.csv)</option>
            <option>Excel (.xlsx)</option>
            <option>JSON (.json)</option>
            <option>PDF (.pdf)</option>
          </select>
        </div>
        <div class="form-group"><label class="form-label">Date Range</label>
          <select class="form-select" id="exp-range">
            <option>All time</option>
            <option>This month</option>
            <option>Last 30 days</option>
            <option>Last 90 days</option>
            <option>This year</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-export')">Cancel</button>
        <button class="btn btn-primary" onclick="doExport()">
          <svg viewBox="0 0 24 24">
            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
            <polyline points="7 10 12 15 17 10" />
            <line x1="12" y1="15" x2="12" y2="3" />
          </svg>
          Download
        </button>
      </div>
    </div>
  </div>

  <!-- Add Customer Modal -->
  <div class="modal-overlay" id="modal-addcustomer">
    <div class="modal modal-lg">
      <div class="modal-head">
        <div>
          <div class="modal-title">Add New Customer</div>
          <div class="modal-sub">Register a customer manually</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-addcustomer')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div class="form-grid">
          <div class="form-group"><label class="form-label">Full Name</label><input class="form-input" id="ac-name"
              type="text" placeholder="e.g. Sophie Walton" /></div>
          <div class="form-group"><label class="form-label">Email Address</label><input class="form-input" id="ac-email"
              type="email" placeholder="sophie@email.com" /></div>
          <div class="form-group"><label class="form-label">Location</label><input class="form-input" id="ac-loc"
              type="text" placeholder="e.g. London, UK" /></div>
          <div class="form-group"><label class="form-label">Status</label>
            <select class="form-select" id="ac-status">
              <option>Active</option>
              <option>Inactive</option>
              <option>Pending</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-addcustomer')">Cancel</button>
        <button class="btn btn-primary" onclick="submitCustomer()">
          <svg viewBox="0 0 24 24">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Add Customer
        </button>
      </div>
    </div>
  </div>

  <!-- Edit Customer Modal -->
  <div class="modal-overlay" id="modal-editcustomer">
    <div class="modal modal-lg">
      <div class="modal-head">
        <div>
          <div class="modal-title">Edit Customer</div>
          <div class="modal-sub" id="editcustomer-sub">Updating customer details</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-editcustomer')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="ec-idx" />
        <div class="form-grid">
          <div class="form-group"><label class="form-label">Full Name</label><input class="form-input" id="ec-name"
              type="text" /></div>
          <div class="form-group"><label class="form-label">Email</label><input class="form-input" id="ec-email"
              type="email" /></div>
          <div class="form-group"><label class="form-label">Location</label><input class="form-input" id="ec-loc"
              type="text" /></div>
          <div class="form-group"><label class="form-label">Orders</label><input class="form-input" id="ec-orders"
              type="number" min="0" /></div>
          <div class="form-group"><label class="form-label">Total Spent</label><input class="form-input" id="ec-spent"
              type="text" /></div>
          <div class="form-group"><label class="form-label">Status</label>
            <select class="form-select" id="ec-status">
              <option>Active</option>
              <option>Inactive</option>
              <option>Pending</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-editcustomer')">Cancel</button>
        <button class="btn btn-primary" onclick="saveEditCustomer()">Save Changes</button>
      </div>
    </div>
  </div>

  <!-- View Customer Modal -->
  <div class="modal-overlay" id="modal-viewcustomer">
    <div class="modal">
      <div class="modal-body" style="padding-top:24px;">
        <div class="profile-banner"></div>
        <div class="profile-av" id="vc-av">SW</div>
        <div style="padding:0 4px;">
          <div class="profile-name" id="vc-name">Sophie Walton</div>
          <div class="profile-role" id="vc-role">Active Customer</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:16px;">
            <div class="card" style="padding:14px;">
              <div class="stat-lbl">Email</div>
              <div style="font-size:12.5px;font-weight:600;color:var(--c5);margin-top:3px;" id="vc-email">—</div>
            </div>
            <div class="card" style="padding:14px;">
              <div class="stat-lbl">Location</div>
              <div style="font-size:12.5px;font-weight:600;color:var(--c5);margin-top:3px;" id="vc-loc">—</div>
            </div>
            <div class="card" style="padding:14px;">
              <div class="stat-lbl">Total Orders</div>
              <div style="font-size:22px;font-weight:800;color:var(--c4);" id="vc-orders">0</div>
            </div>
            <div class="card" style="padding:14px;">
              <div class="stat-lbl">Total Spent</div>
              <div style="font-size:22px;font-weight:800;color:var(--c4);" id="vc-spent">$0</div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-viewcustomer')">Close</button>
      </div>
    </div>
  </div>

  <!-- Edit Product Modal -->
  <div class="modal-overlay" id="modal-editproduct">
    <div class="modal modal-lg">
      <div class="modal-head">
        <div>
          <div class="modal-title">Edit Product</div>
          <div class="modal-sub" id="editprod-sub">Updating product details</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-editproduct')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="ep-idx" />
        <div class="form-grid">
          <div class="form-group"><label class="form-label">Product Name</label><input class="form-input" id="ep-name"
              type="text" /></div>
          <div class="form-group"><label class="form-label">Category</label>
            <select class="form-select" id="ep-cat">
              <option>Men</option>
              <option>Women</option>
              <option>Kids</option>
              <option>Accessories</option>
            </select>
          </div>
          <div class="form-group"><label class="form-label">Price ($)</label><input class="form-input" id="ep-price"
              type="text" /></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-editproduct')">Cancel</button>
        <button class="btn btn-primary" onclick="saveEditProduct()">Save Changes</button>
      </div>
    </div>
  </div>

  <!-- Product Display Placement Modal -->
  <div class="modal-overlay" id="modal-placement">
    <div class="modal modal-sm">
      <div class="modal-head">
        <div>
          <div class="modal-title" id="placement-title">Product Display</div>
          <div class="modal-sub" id="placement-sub">Choose where to display this product</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-placement')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="placement-idx" />
        <p style="font-size:12px;color:var(--muted);margin-bottom:14px;">Select all sections where this product should
          appear on the storefront.</p>
        <div id="placement-options" style="display:flex;flex-direction:column;gap:8px;"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-placement')">Cancel</button>
        <button class="btn btn-primary" onclick="savePlacement()">
          <svg viewBox="0 0 24 24">
            <polyline points="20 6 9 17 4 12" />
          </svg>
          Save Placement
        </button>
      </div>
    </div>
  </div>

  <!-- Delete Confirm Modal -->
  <div class="modal-overlay" id="modal-confirm">
    <div class="modal modal-sm">
      <div class="modal-body" style="text-align:center;padding:28px 24px;">
        <div class="confirm-icon" id="confirm-icon">
          <svg viewBox="0 0 24 24">
            <polyline points="3 6 5 6 21 6" />
            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" />
            <path d="M10 11v6" />
            <path d="M14 11v6" />
            <path d="M9 6V4h6v2" />
          </svg>
        </div>
        <div style="font-size:16px;font-weight:800;color:var(--c5);margin-bottom:8px;" id="confirm-title">Delete this
          item?</div>
        <div style="font-size:13px;color:var(--muted);margin-bottom:6px;" id="confirm-msg">This action cannot be undone.
        </div>
      </div>
      <div class="modal-footer" style="justify-content:center; padding-top:10px;">
        <button class="btn btn-ghost" onclick="closeModal('modal-confirm')" style="min-width:110px;">Cancel</button>
        <button class="btn btn-danger" id="confirm-action-btn" style="min-width:110px;">Confirm</button>
      </div>
    </div>
  </div>

  <!-- Notifications Modal -->
  <div class="modal-overlay" id="modal-notifications">
    <div class="modal" style="max-width:400px;">
      <div class="modal-head">
        <div>
          <div class="modal-title">Notifications</div>
          <div class="modal-sub">You have 3 unread alerts</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-notifications')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div id="notif-list">
          <div class="notif-item notif-unread">
            <div class="notif-dot" style="background:#a8845e"></div>
            <div>
              <div class="notif-title">New order #ORD-1081 placed</div>
              <div class="notif-time">2 minutes ago</div>
            </div>
          </div>
          <div class="notif-item notif-unread">
            <div class="notif-dot" style="background:#2d8a5a"></div>
            <div>
              <div class="notif-title">Payment confirmed — #ORD-1080</div>
              <div class="notif-time">14 minutes ago</div>
            </div>
          </div>
          <div class="notif-item notif-unread">
            <div class="notif-dot" style="background:#c0392b"></div>
            <div>
              <div class="notif-title">Low stock: Wool Blend Overcoat (18 left)</div>
              <div class="notif-time">5 hours ago</div>
            </div>
          </div>
          <div class="notif-item">
            <div class="notif-dot" style="background:#2563eb"></div>
            <div>
              <div class="notif-title">New customer: Hana Müller registered</div>
              <div class="notif-time">3 hours ago</div>
            </div>
          </div>
          <div class="notif-item">
            <div class="notif-dot" style="background:#b39c80"></div>
            <div>
              <div class="notif-title">Order #ORD-1076 was refunded</div>
              <div class="notif-time">1 day ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost btn-sm" onclick="markAllRead()">Mark all read</button>
        <button class="btn btn-ghost" onclick="closeModal('modal-notifications')">Close</button>
      </div>
    </div>
  </div>

  <!-- Messages Modal -->
  <div class="modal-overlay" id="modal-messages">
    <div class="modal" style="max-width:420px;">
      <div class="modal-head">
        <div>
          <div class="modal-title">Messages</div>
          <div class="modal-sub">Internal team messages</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-messages')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <div style="display:flex;flex-direction:column;gap:12px;max-height:300px;overflow-y:auto;" id="messages-list">
          <div style="display:flex;gap:10px;">
            <div class="cust-av" style="background:var(--c3);font-size:11px;">JT</div>
            <div style="background:var(--bg);border-radius:0 10px 10px 10px;padding:10px 13px;flex:1;">
              <div style="font-size:12px;font-weight:700;color:var(--c5);">James T.</div>
              <div style="font-size:12.5px;color:var(--text);margin-top:2px;">Can you check the Wool Coat stock level?
              </div>
              <div style="font-size:11px;color:var(--muted);margin-top:5px;">10:22 AM</div>
            </div>
          </div>
          <div style="display:flex;gap:10px;flex-direction:row-reverse;">
            <div class="cust-av" style="background:var(--c4);font-size:11px;">AM</div>
            <div style="background:var(--c3);border-radius:10px 0 10px 10px;padding:10px 13px;flex:1;">
              <div style="font-size:12px;font-weight:700;color:rgba(255,255,255,.8);">You</div>
              <div style="font-size:12.5px;color:#fff;margin-top:2px;">Yes, only 18 units left. Reorder in progress.
              </div>
              <div style="font-size:11px;color:rgba(255,255,255,.6);margin-top:5px;">10:35 AM</div>
            </div>
          </div>
        </div>
        <div style="display:flex;gap:8px;margin-top:14px;">
          <input class="form-input" id="msg-input" type="text" placeholder="Type a message…"
            onkeydown="if(event.key==='Enter')sendMessage()" />
          <button class="btn btn-primary btn-sm" onclick="sendMessage()">Send</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Modal -->
  <div class="modal-overlay" id="modal-profile">
    <div class="modal">
      <div class="modal-body" style="padding-top:24px;">
        <div class="profile-banner"></div>
        <div class="profile-av">AM</div>
        <div style="padding:0 4px;">
          <div class="profile-name">Admin Manager</div>
          <div class="profile-role">Store Administrator · Atelier Clothing Co.</div>
          <div style="margin-top:20px;display:flex;flex-direction:column;gap:14px;">
            <div class="form-group"><label class="form-label">Display Name</label><input class="form-input"
                value="Admin Manager" type="text" /></div>
            <div class="form-group"><label class="form-label">Email</label><input class="form-input"
                value="admin@atelier.com" type="email" /></div>
            <div class="form-group"><label class="form-label">New Password</label><input class="form-input"
                type="password" placeholder="Leave blank to keep current" /></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-profile')">Cancel</button>
        <button class="btn btn-primary"
          onclick="showToast('Profile updated!','success');closeModal('modal-profile')">Save Changes</button>
      </div>
    </div>
  </div>

  <!-- Order Detail Modal -->
  <div class="modal-overlay" id="modal-orderdetail">
    <div class="modal">
      <div class="modal-head">
        <div>
          <div class="modal-title" id="od-title">Order Details</div>
          <div class="modal-sub" id="od-sub">Order summary</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-orderdetail')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body" id="od-body"></div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-orderdetail')">Close</button>
      </div>
    </div>
  </div>

  <!-- Status Change Modal -->
  <div class="modal-overlay" id="modal-changestatus">
    <div class="modal modal-sm">
      <div class="modal-head">
        <div>
          <div class="modal-title">Change Status</div>
          <div class="modal-sub" id="cs-sub">Update order status</div>
        </div>
        <button class="modal-close" onclick="closeModal('modal-changestatus')"><svg viewBox="0 0 24 24">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="cs-idx" />
        <div class="form-group"><label class="form-label">New Status</label>
          <select class="form-select" id="cs-status">
            <option>Pending</option>
            <option>Processing</option>
            <option>Shipped</option>
            <option>Completed</option>
            <option>Refunded</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-ghost" onclick="closeModal('modal-changestatus')">Cancel</button>
        <button class="btn btn-primary" onclick="applyStatusChange()">Apply</button>
      </div>
    </div>
  </div>

  <!-- Settings Save Confirm -->
  <div class="modal-overlay" id="modal-savesettings">
    <div class="modal modal-sm">
      <div class="modal-body" style="text-align:center;padding:28px 24px;">
        <div class="confirm-icon success">
          <svg viewBox="0 0 24 24">
            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
            <polyline points="17 21 17 13 7 13 7 21" />
            <polyline points="7 3 7 8 15 8" />
          </svg>
        </div>
        <div style="font-size:16px;font-weight:800;color:var(--c5);margin-bottom:8px;">Save Settings?</div>
        <div style="font-size:13px;color:var(--muted);">Your store settings will be updated immediately.</div>
      </div>
      <div class="modal-footer" style="justify-content:center;">
        <button class="btn btn-ghost" onclick="closeModal('modal-savesettings')">Cancel</button>
        <button class="btn btn-primary" onclick="doSaveSettings()">Save Changes</button>
      </div>
    </div>
  </div>

  <!-- ══ OVERLAY & TOAST ══════════════════════════════════════ -->
  <div class="mob-overlay" id="mobOverlay" onclick="closeMob()"></div>
  <div class="toast" id="toast">
    <svg viewBox="0 0 24 24">
      <path d="M20 6L9 17l-5-5" />
    </svg>
    <span id="toastMsg">Done!</span>
  </div>

  <!-- ══ SHELL ════════════════════════════════════════════════ -->
  <div class="shell">

    <aside class="sidebar" id="sidebar">
      <div class="sb-head">
        <div class="sb-logo">
          <svg viewBox="0 0 24 24">
            <path
              d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z" />
          </svg>
        </div>
        <span class="sb-brand">Atelier</span>
      </div>
      <nav class="sb-nav">
        <div class="sb-group-label">Main</div>
        <div class="sb-item active" data-sec="overview" data-tip="Dashboard" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="3" width="7" height="7" />
            <rect x="14" y="3" width="7" height="7" />
            <rect x="14" y="14" width="7" height="7" />
            <rect x="3" y="14" width="7" height="7" />
          </svg>
          <span class="sb-label">Dashboard</span>
        </div>
        <div class="sb-item" data-sec="orders" data-tip="Orders" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 01-8 0" />
          </svg>
          <span class="sb-label">Orders</span>
        </div>
        <div class="sb-group-label" style="margin-top:8px;">Catalogue</div>
        <div class="sb-item" data-sec="products" data-tip="Products" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <path
              d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" />
          </svg>
          <span class="sb-label">Products</span>
        </div>
        <div class="sb-item" data-sec="addproduct" data-tip="Add Product" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" />
            <line x1="12" y1="8" x2="12" y2="16" />
            <line x1="8" y1="12" x2="16" y2="12" />
          </svg>
          <span class="sb-label">Add Product</span>
        </div>
        <div class="sb-group-label" style="margin-top:8px;">People</div>
        <div class="sb-item" data-sec="customers" data-tip="Customers" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M23 21v-2a4 4 0 00-3-3.87" />
            <path d="M16 3.13a4 4 0 010 7.75" />
          </svg>
          <span class="sb-label">Customers</span>
        </div>
        <div class="sb-group-label" style="margin-top:8px;">Insights</div>
        <div class="sb-item" data-sec="analytics" data-tip="Analytics" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <line x1="18" y1="20" x2="18" y2="10" />
            <line x1="12" y1="20" x2="12" y2="4" />
            <line x1="6" y1="20" x2="6" y2="14" />
          </svg>
          <span class="sb-label">Analytics</span>
        </div>
        <div class="sb-group-label" style="margin-top:8px;">System</div>
        <div class="sb-item" data-sec="settings" data-tip="Settings" onclick="nav(this)">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="3" />
            <path
              d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z" />
          </svg>
          <span class="sb-label">Settings</span>
        </div>
      </nav>
      <div class="sb-foot">
        <button class="sb-toggle" onclick="toggleSidebar()">
          <svg viewBox="0 0 24 24">
            <polyline points="15 18 9 12 15 6" />
          </svg>
          <span class="sb-label">Collapse</span>
        </button>
      </div>
    </aside>

    <div class="main">
      <header class="topbar">
        <div class="topbar-left">
          <button class="mob-menu-btn" onclick="openMob()">
            <svg viewBox="0 0 24 24">
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
          </button>
          <div>
            <div class="page-heading" id="pgTitle">Dashboard Overview</div>
            <div class="page-sub" id="pgSub">Welcome back — here's your store at a glance</div>
          </div>
        </div>
        <div class="topbar-right">
          <button class="tb-icon" onclick="openModal('modal-notifications')" title="Notifications">
            <svg viewBox="0 0 24 24">
              <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 01-3.46 0" />
            </svg>
            <div class="tb-dot" id="notif-dot"></div>
          </button>
          <button class="tb-icon" onclick="openModal('modal-messages')" title="Messages">
            <svg viewBox="0 0 24 24">
              <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
            </svg>
          </button>
          <div class="tb-avatar" onclick="openModal('modal-profile')" title="Profile">AM</div>
        </div>
      </header>

      <main class="content">

        <!-- OVERVIEW -->
        <section class="section active" id="sec-overview">
          <div class="sec-head">
            <div>
              <div class="sec-title">Good morning, Admin 👋</div>
              <div class="sec-sub">Here's what's happening in your clothing store today.</div>
            </div>
            <button class="btn btn-primary" onclick="openModal('modal-quickadd')">
              <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
              </svg>
              Quick Add
            </button>
          </div>
          <div class="stat-grid" id="overviewStats"></div>
          <div class="two-col">
            <div class="card">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                <span style="font-size:14px;font-weight:700;color:var(--c5);">Monthly Revenue</span>
                <span style="font-size:11.5px;color:var(--muted);">Last 7 months</span>
              </div>
              <div class="bar-chart" id="revenueChart"></div>
            </div>
            <div class="card">
              <div style="font-size:14px;font-weight:700;color:var(--c5);margin-bottom:14px;">Recent Activity</div>
              <div id="activityFeed"></div>
            </div>
          </div>
        </section>

        <!-- ORDERS -->
        <section class="section" id="sec-orders">
          <div class="sec-head">
            <div>
              <div class="sec-title">Orders</div>
              <div class="sec-sub" id="orders-count-sub">Loading…</div>
            </div>
            <div class="sec-actions">
              <button class="btn btn-ghost" onclick="openModal('modal-export')">
                <svg viewBox="0 0 24 24">
                  <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Export
              </button>
              <button class="btn btn-primary" onclick="openNewOrder()">
                <svg viewBox="0 0 24 24">
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                New Order
              </button>
            </div>
          </div>
          <div class="card">
            <div class="tbl-toolbar">
              <div class="tbl-search">
                <svg viewBox="0 0 24 24">
                  <circle cx="11" cy="11" r="8" />
                  <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" id="orders-search" placeholder="Search orders…" oninput="filterOrders()" />
              </div>
              <select class="form-select" style="width:auto;padding:7px 10px;font-size:12px;" id="orders-status-filter"
                onchange="filterOrders()">
                <option value="">All Statuses</option>
                <option>Pending</option>
                <option>Processing</option>
                <option>Shipped</option>
                <option>Completed</option>
                <option>Refunded</option>
              </select>
            </div>
            <div class="tbl-wrap">
              <table>
                <thead>
                  <tr>
                    <th class="sortable" onclick="sortTable('orders','id')">Order ID</th>
                    <th class="sortable" onclick="sortTable('orders','cust')">Customer</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th class="sortable" onclick="sortTable('orders','status')">Status</th>
                    <th class="sortable" onclick="sortTable('orders','date')">Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="ordersTbody"></tbody>
              </table>
            </div>
            <div class="pagination" id="orders-pagination"></div>
          </div>
        </section>

        <!-- PRODUCTS -->
        <section class="section" id="sec-products">
          <div class="sec-head">
            <div>
              <div class="sec-title">Products</div>
              <div class="sec-sub" id="products-count-sub">Loading…</div>
            </div>
            <div class="sec-actions">
              <button class="btn btn-ghost" onclick="openModal('modal-export')">
                <svg viewBox="0 0 24 24">
                  <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Export
              </button>
              <button class="btn btn-primary" onclick="nav(document.querySelector('[data-sec=addproduct]'))">
                <svg viewBox="0 0 24 24">
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add Product
              </button>
            </div>
          </div>
          <!-- Category counts -->
          <div id="cat-counts-bar"
            style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;"></div>
          <div style="margin-bottom:14px;display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
            <div class="tbl-search" style="max-width:280px;">
              <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
              <input type="text" id="products-search" placeholder="Search products…" oninput="renderProducts()" />
            </div>
            <select class="form-select" style="width:auto;padding:7px 10px;font-size:12px;" id="products-cat-filter"
              onchange="renderProducts()">
              <option value="">All Categories</option>
              <option>Men</option>
              <option>Women</option>
              <option>Kids</option>
              <option>Accessories</option>
            </select>
          </div>
          <div class="prod-grid" id="productGrid"></div>
        </section>

        <!-- ADD PRODUCT -->
        <section class="section" id="sec-addproduct">
          <div class="sec-head">
            <div>
              <div class="sec-title">Add New Product</div>
              <div class="sec-sub">Fill in the details to list a new clothing item</div>
            </div>
          </div>
          <form id="addProductForm" onsubmit="submitProduct(event)">
            <div class="card" style="margin-bottom:16px;">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Basic Info</div>
              <div class="form-grid">
                <div class="form-group form-full"><label class="form-label">Product Name</label><input class="form-input"
                    name="name" type="text" placeholder="e.g. Classic Oxford Shirt" required /></div>
                <div class="form-group"><label class="form-label">Price ($)</label><input class="form-input"
                    name="price" type="number" min="0" step="0.01" placeholder="0.00" required /></div>
                <div class="form-group form-full"><label class="form-label">Description</label><textarea
                    class="form-textarea" name="description"
                    placeholder="Describe the product — fabric, fit, style…"></textarea></div>
              </div>
              <div
                style="margin-top:14px;padding:12px 14px;background:var(--bg);border-radius:var(--radius-sm);border:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
                <div>
                  <div style="font-size:12px;font-weight:700;color:var(--c5);">Total Stock</div>
                  <div style="font-size:11px;color:var(--muted);margin-top:2px;">Auto-calculated from sizes below</div>
                </div>
                <div style="font-size:22px;font-weight:900;color:var(--c4);" id="totalStockDisplay">0</div>
              </div>
            </div>
            <div class="card" style="margin-bottom:16px;">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Product Image</div>
              <label class="file-zone" id="fileZone">
                <input type="file" name="image" accept="image/*" onchange="previewImage(this)" />
                <div id="filePreview">
                  <div class="file-zone-icon">🖼️</div>
                  <p><span>Click to upload</span> or drag &amp; drop</p>
                  <p style="font-size:11px;margin-top:4px;">PNG, JPG, WEBP up to 5MB</p>
                </div>
              </label>
            </div>
            <div class="card" style="margin-bottom:16px;">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Storefront Placement</div>
              <p style="font-size:12px;color:var(--muted);margin-bottom:12px;">Choose where this product should appear.
                Select all that apply.</p>
              <div id="add-placement-options"
                style="display:grid;grid-template-columns:repeat(auto-fill, minmax(200px, 1fr));gap:10px;">
                <!-- Dynamically filled -->
              </div>
            </div>

            <div class="card" style="margin-bottom:16px;">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                <div
                  style="font-size:13px;font-weight:700;color:var(--c5);text-transform:uppercase;letter-spacing:.5px;">
                  Available Colors</div>
                <button type="button" class="add-color-btn" onclick="addColor()">
                  <svg viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  Add Color
                </button>
              </div>
              <div class="color-list" id="colorList"></div>
            </div>
            <div class="card" style="margin-bottom:16px;">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <div
                  style="font-size:13px;font-weight:700;color:var(--c5);text-transform:uppercase;letter-spacing:.5px;">
                  Sizes &amp; Measurements</div>
                <button type="button" class="btn btn-ghost btn-sm" onclick="addCustomSize()">
                  <svg viewBox="0 0 24 24">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                  Custom Size
                </button>
              </div>
              <p style="font-size:12px;color:var(--muted);margin-bottom:12px;">Select sizes to activate them, then fill
                in measurements.</p>
              <div class="size-picker" id="sizePicker"></div>
              <div id="sizeTableWrap"></div>
            </div>
            <div style="display:flex;gap:12px;justify-content:flex-end;">
              <button type="button" class="btn btn-ghost" onclick="confirmDiscard()">Discard</button>
              <button type="submit" class="btn btn-primary">
                <svg viewBox="0 0 24 24">
                  <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                  <polyline points="17 21 17 13 7 13 7 21" />
                  <polyline points="7 3 7 8 15 8" />
                </svg>
                Save Product
              </button>
            </div>
          </form>
        </section>

        <!-- CUSTOMERS -->
        <section class="section" id="sec-customers">
          <div class="sec-head">
            <div>
              <div class="sec-title">Customers</div>
              <div class="sec-sub" id="customers-count-sub">Loading…</div>
            </div>
            <div class="sec-actions">
              <button class="btn btn-ghost" onclick="openModal('modal-export')">
                <svg viewBox="0 0 24 24">
                  <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Export
              </button>
              <button class="btn btn-primary" onclick="openModal('modal-addcustomer')">
                <svg viewBox="0 0 24 24">
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add Customer
              </button>
            </div>
          </div>
          <div class="card">
            <div class="tbl-toolbar">
              <div class="tbl-search">
                <svg viewBox="0 0 24 24">
                  <circle cx="11" cy="11" r="8" />
                  <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" id="customers-search" placeholder="Search customers…" oninput="filterCustomers()" />
              </div>
              <select class="form-select" style="width:auto;padding:7px 10px;font-size:12px;"
                id="customers-status-filter" onchange="filterCustomers()">
                <option value="">All Statuses</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Pending</option>
              </select>
            </div>
            <div class="tbl-wrap">
              <table>
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th class="sortable" onclick="sortTable('customers','orders')">Orders</th>
                    <th class="sortable" onclick="sortTable('customers','spent')">Total Spent</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="customersTbody"></tbody>
              </table>
            </div>
            <div class="pagination" id="customers-pagination"></div>
          </div>
        </section>

        <!-- ANALYTICS -->
        <section class="section" id="sec-analytics">
          <div class="sec-head">
            <div>
              <div class="sec-title">Analytics</div>
              <div class="sec-sub">Performance overview</div>
            </div>
            <div class="sec-actions">
              <button class="btn btn-ghost" onclick="openModal('modal-export')">
                <svg viewBox="0 0 24 24">
                  <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                  <polyline points="7 10 12 15 17 10" />
                  <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Export Report
              </button>
            </div>
          </div>
          <div class="analytics-grid" id="analyticsCards"></div>
          <div class="two-col">
            <div class="card">
              <div style="font-size:14px;font-weight:700;color:var(--c5);margin-bottom:14px;">Sales by Category</div>
              <div class="bar-chart" id="catChart"></div>
            </div>
            <div class="card">
              <div style="font-size:14px;font-weight:700;color:var(--c5);margin-bottom:14px;">Top Selling Products</div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Units</th>
                      <th>Revenue</th>
                    </tr>
                  </thead>
                  <tbody id="topProdTbody"></tbody>
                </table>
              </div>
            </div>
          </div>
        </section>

        <!-- SETTINGS -->
        <section class="section" id="sec-settings">
          <div class="sec-head">
            <div>
              <div class="sec-title">Settings</div>
              <div class="sec-sub">Store preferences and configuration</div>
            </div>
            <button class="btn btn-primary" onclick="openModal('modal-savesettings')">
              <svg viewBox="0 0 24 24">
                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                <polyline points="17 21 17 13 7 13 7 21" />
                <polyline points="7 3 7 8 15 8" />
              </svg>
              Save Changes
            </button>
          </div>
          <div style="display:grid;gap:16px;">
            <div class="card">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Store Details</div>
              <div class="form-grid">
                <div class="form-group"><label class="form-label">Store Name</label><input class="form-input"
                    id="s-storename" value="Atelier Clothing Co." type="text" /></div>
                <div class="form-group"><label class="form-label">Contact Email</label><input class="form-input"
                    id="s-email" value="hello@atelier.com" type="email" /></div>
                <div class="form-group"><label class="form-label">Currency</label>
                  <select class="form-select" id="s-currency">
                    <option>USD ($)</option>
                    <option>EUR (€)</option>
                    <option>GBP (£)</option>
                  </select>
                </div>
                <div class="form-group"><label class="form-label">Timezone</label><input class="form-input" id="s-tz"
                    value="Europe/Paris" type="text" /></div>
              </div>
            </div>
            <div class="card">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Notifications</div>
              <div style="display:grid;gap:0;">
                <div
                  style="display:flex;align-items:center;justify-content:space-between;padding:13px 0;border-bottom:1px solid var(--border);">
                  <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--c5);">New Orders</div>
                    <div style="font-size:11.5px;color:var(--muted);margin-top:2px;">Email alert when a new order
                      arrives</div>
                  </div>
                  <label class="toggle-wrap"><input type="checkbox" checked id="t-orders" /><span
                      class="toggle-track"></span><span class="toggle-thumb"></span></label>
                </div>
                <div
                  style="display:flex;align-items:center;justify-content:space-between;padding:13px 0;border-bottom:1px solid var(--border);">
                  <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--c5);">Low Stock Alerts</div>
                    <div style="font-size:11.5px;color:var(--muted);margin-top:2px;">When a product drops below 5 units
                    </div>
                  </div>
                  <label class="toggle-wrap"><input type="checkbox" checked id="t-stock" /><span
                      class="toggle-track"></span><span class="toggle-thumb"></span></label>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;padding:13px 0;">
                  <div>
                    <div style="font-size:13.5px;font-weight:600;color:var(--c5);">Weekly Report</div>
                    <div style="font-size:11.5px;color:var(--muted);margin-top:2px;">Summary digest every Monday</div>
                  </div>
                  <label class="toggle-wrap"><input type="checkbox" id="t-weekly" /><span
                      class="toggle-track"></span><span class="toggle-thumb"></span></label>
                </div>
              </div>
            </div>
            <div class="card">
              <div
                style="font-size:13px;font-weight:700;color:var(--c5);margin-bottom:16px;text-transform:uppercase;letter-spacing:.5px;">
                Danger Zone</div>
              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                <div>
                  <div style="font-size:13.5px;font-weight:600;color:var(--c5);">Clear All Orders</div>
                  <div style="font-size:11.5px;color:var(--muted);margin-top:2px;">Permanently delete all order records
                  </div>
                </div>
                <button class="btn btn-danger"
                  onclick="confirmAction('Clear all orders? This is irreversible.','clearOrders')">Clear Orders</button>
              </div>
              <div style="height:1px;background:var(--border);margin:14px 0;"></div>
              <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                <div>
                  <div style="font-size:13.5px;font-weight:600;color:var(--c5);">Reset All Data</div>
                  <div style="font-size:11.5px;color:var(--muted);margin-top:2px;">Restore all data to factory defaults
                  </div>
                </div>
                <button class="btn btn-danger"
                  onclick="confirmAction('Reset ALL data to defaults? This cannot be undone.','resetData')">Reset
                  Data</button>
              </div>
            </div>
          </div>
        </section>

      </main>
    </div>
  </div>

  <script>
    /* ═══════════════════════════════════════════════════════════
       DATA STORE — mutable arrays for full dynamic behaviour
    ═══════════════════════════════════════════════════════════ */
    // Load data from localStorage (no default seed products)
    let ORDERS = JSON.parse(localStorage.getItem('dashboard_orders') || '[]');
    let PRODUCTS = JSON.parse(localStorage.getItem('dashboard_products') || '[]');
    let CUSTOMERS = JSON.parse(localStorage.getItem('dashboard_customers') || '[]');

    // One-time cleanup: remove legacy default seeded products by numeric IDs
    // This preserves any admin-added products (which use string IDs like "P123...")
    (function removeLegacySeededProducts() {
      const legacyIds = new Set([1, 2, 3, 4, 25, 26, 27]);
      const hadLegacy = PRODUCTS.some(p => typeof p.id === 'number' && legacyIds.has(p.id));
      if (hadLegacy) {
        PRODUCTS = PRODUCTS.filter(p => !(typeof p.id === 'number' && legacyIds.has(p.id)));
        localStorage.setItem('dashboard_products', JSON.stringify(PRODUCTS));
      }
    })();

    /* helper: total stock for a product */
    function calcStock(p) {
      return p.sizes ? Object.values(p.sizes).reduce((a, b) => a + (parseInt(b) || 0), 0) : 0;
    }

    // Save functions to persist changes
    function saveOrders() { localStorage.setItem('dashboard_orders', JSON.stringify(ORDERS)); }
    function saveProducts() { localStorage.setItem('dashboard_products', JSON.stringify(PRODUCTS)); }
    function saveCustomers() { localStorage.setItem('dashboard_customers', JSON.stringify(CUSTOMERS)); }

    const ACTIVITY = [
      { dot: '#a8845e', title: 'Order #ORD-1081 placed by Sophie W.', time: '2 minutes ago' },
      { dot: '#2d8a5a', title: 'Payment confirmed for #ORD-1080', time: '14 minutes ago' },
      { dot: '#c0392b', title: 'Order #ORD-1076 was refunded', time: '1 hour ago' },
      { dot: '#2563eb', title: 'New customer registered', time: '3 hours ago' },
      { dot: '#b39c80', title: 'Wool Blend Overcoat — low stock', time: '5 hours ago' },
    ];

    const MONTH_NAMES = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const CAT_LABELS = ['Men', 'Women', 'Kids', 'Acc.'];
    const CAT_PCT = [65, 80, 45, 35];
    const TOP_PROD = [
      { name: 'Oxford Button Shirt', units: 214, rev: '$14,552' },
      { name: 'Wool Blend Overcoat', units: 89, rev: '$21,805' },
      { name: 'Merino Wool Hoodie', units: 176, rev: '$19,712' },
      { name: 'Relaxed Linen Trousers', units: 130, rev: '$9,360' },
    ];

    let orderSort = { col: '', dir: 1 };
    let customerSort = { col: '', dir: 1 };
    let ordersPage = 1, customersPage = 1;
    const PAGE_SIZE = 5;
    const CATS = ['Men', 'Women', 'Kids', 'Accessories'];
    const CAT_EMOJIS = { Men: '👔', Women: '👗', Kids: '🧒', Accessories: '🎩' };

    /* ─── badge helper ─── */
    function badge(s) {
      const m = { Completed: 'green', Processing: 'blue', Shipped: 'orange', Pending: 'gray', Refunded: 'red', Active: 'green', Inactive: 'gray' };
      return `<span class="badge ${m[s] || 'gray'}">${s}</span>`;
    }

    /* ─── calc total revenue from completed orders ─── */
    function calcRevenue() {
      return ORDERS.reduce((total, o) => {
        if (o.status === 'Refunded') return total;
        const p = parseFloat((o.price || '0').replace('$', '').replace(',', '')) || 0;
        return total + p * (o.qty || 1);
      }, 0);
    }

    /* ════════════════════════════════════════════
       MODAL SYSTEM
    ════════════════════════════════════════════ */
    function openModal(id) {
      document.getElementById(id).classList.add('open');
    }
    function closeModal(id) {
      document.getElementById(id).classList.remove('open');
    }
    /* close on overlay click */
    document.querySelectorAll('.modal-overlay').forEach(o => {
      o.addEventListener('click', e => { if (e.target === o) o.classList.remove('open'); });
    });
    /* close on Escape */
    document.addEventListener('keydown', e => { if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.open').forEach(o => o.classList.remove('open')); });

    /* ════════════════════════════════════════════
       RENDER OVERVIEW
    ════════════════════════════════════════════ */
    function renderOverview() {
      const rev = calcRevenue();
      const revFormatted = rev >= 1000 ? '$' + (rev / 1000).toFixed(1) + 'K' : rev > 0 ? '$' + rev.toFixed(2) : '$0.00';
      const totalStock = PRODUCTS.reduce((a, p) => a + calcStock(p), 0);
      const activeOrders = ORDERS.filter(o => o.status !== 'Completed' && o.status !== 'Refunded').length;
      const completedOrders = ORDERS.filter(o => o.status === 'Completed').length;

      document.getElementById('overviewStats').innerHTML = [
        { ico: 'a', svg: '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>', lbl: 'Total Revenue', val: revFormatted, chg: 'up', chgTxt: ORDERS.length === 0 ? '0% — no orders yet' : `From ${completedOrders} completed order${completedOrders !== 1 ? 's' : ''}` },
        { ico: 'b', svg: '<path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/>', lbl: 'Total Orders', val: ORDERS.length || '0', chg: ORDERS.length > 0 ? 'up' : 'dn', chgTxt: ORDERS.length === 0 ? '0% — no orders yet' : `${activeOrders} active right now` },
        { ico: 'c', svg: '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>', lbl: 'Total Customers', val: CUSTOMERS.length || '0', chg: CUSTOMERS.length > 0 ? 'up' : 'dn', chgTxt: CUSTOMERS.length === 0 ? '0% — no customers yet' : `${CUSTOMERS.filter(c => c.status === 'Active').length} active` },
        { ico: 'd', svg: '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>', lbl: 'Total Stock', val: totalStock || '0', chg: totalStock > 0 ? 'up' : 'dn', chgTxt: totalStock === 0 ? '0% — no products yet' : `Across ${PRODUCTS.length} product${PRODUCTS.length !== 1 ? 's' : ''}` },
      ].map(c => `
    <div class="stat-card">
      <div class="stat-ico ${c.ico}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">${c.svg}</svg></div>
      <div>
        <div class="stat-lbl">${c.lbl}</div>
        <div class="stat-val">${c.val}</div>
        <div class="stat-chg ${c.chg}">${c.chgTxt}</div>
      </div>
    </div>`).join('');

      /* ── Dynamic Revenue Chart: last 6 months ── */
      const now = new Date();
      const months = [];
      for (let i = 5; i >= 0; i--) {
        const d = new Date(now.getFullYear(), now.getMonth() - i, 1);
        months.push({ year: d.getFullYear(), month: d.getMonth(), label: MONTH_NAMES[d.getMonth()] });
      }
      const monthRevs = months.map(m => {
        const total = ORDERS
          .filter(o => {
            if (o.status === 'Refunded') return false;
            const d = o.isoDate ? new Date(o.isoDate) : null;
            return d && d.getFullYear() === m.year && d.getMonth() === m.month;
          })
          .reduce((sum, o) => {
            const p = parseFloat((o.price || '0').replace('$', '').replace(',', '')) || 0;
            return sum + (p * (o.qty || 1));
          }, 0);
        return { label: m.label, total };
      });
      const maxRev = Math.max(...monthRevs.map(m => m.total), 1);
      const fmt = v => v >= 1000 ? '$' + (v / 1000).toFixed(1) + 'K' : '$' + v.toFixed(0);
      document.getElementById('revenueChart').innerHTML = monthRevs.map(m => {
        const pct = Math.max((m.total / maxRev) * 100, m.total > 0 ? 4 : 0);
        return `<div class="bar-col" title="${m.label}: ${fmt(m.total)}">
      <div class="bar" style="height:${pct}%;position:relative;" data-val="${fmt(m.total)}">
        ${m.total > 0 ? `<div style="position:absolute;top:-18px;left:50%;transform:translateX(-50%);font-size:9px;font-weight:700;color:var(--c4);white-space:nowrap;">${fmt(m.total)}</div>` : ''}
      </div>
      <div class="bar-lbl">${m.label}</div>
    </div>`;
      }).join('');

      /* Activity feed — show real recent orders or placeholder */
      const recentActivity = ORDERS.length > 0
        ? [...ORDERS].reverse().slice(0, 5).map(o => ({
          dot: o.status === 'Completed' ? '#2d8a5a' : o.status === 'Refunded' ? '#c0392b' : o.status === 'Shipped' ? '#c9620e' : '#a8845e',
          title: `Order ${o.id} — ${o.cust} (${o.status})`,
          time: o.date
        }))
        : [{ dot: '#c6baa5', title: 'No activity yet — create your first order!', time: 'Just now' }];

      document.getElementById('activityFeed').innerHTML = recentActivity.map(a => `
    <div class="activity-item">
      <div class="a-dot" style="background:${a.dot}"></div>
      <div><div class="a-title">${a.title}</div><div class="a-time">${a.time}</div></div>
    </div>`).join('');
    }

    /* ════════════════════════════════════════════
       ORDERS TABLE — dynamic, filterable, paginated, sortable
    ════════════════════════════════════════════ */
    function getFilteredOrders() {
      const q = (document.getElementById('orders-search')?.value || '').toLowerCase();
      const sf = document.getElementById('orders-status-filter')?.value || '';
      let data = ORDERS.filter(o => {
        const match = !q || (o.id + o.cust + o.prod + o.status).toLowerCase().includes(q);
        const statusMatch = !sf || o.status === sf;
        return match && statusMatch;
      });
      if (orderSort.col) {
        data = [...data].sort((a, b) => {
          let va = a[orderSort.col], vb = b[orderSort.col];
          return (va < vb ? -1 : va > vb ? 1 : 0) * orderSort.dir;
        });
      }
      return data;
    }

    function filterOrders() { ordersPage = 1; renderOrders(); }

    function renderOrders() {
      const data = getFilteredOrders();
      const total = data.length;
      const pages = Math.max(1, Math.ceil(total / PAGE_SIZE));
      if (ordersPage > pages) ordersPage = pages;
      const slice = data.slice((ordersPage - 1) * PAGE_SIZE, ordersPage * PAGE_SIZE);

      document.getElementById('orders-count-sub').textContent = `${total} order${total !== 1 ? 's' : ''} found`;

      if (!slice.length) {
        document.getElementById('ordersTbody').innerHTML = `<tr><td colspan="7"><div class="empty-state"><div class="empty-icon">📭</div><div class="empty-title">No orders found</div><div class="empty-sub">Try adjusting your search or filters</div></div></td></tr>`;
      } else {
        const idxOf = o => ORDERS.indexOf(o);
        document.getElementById('ordersTbody').innerHTML = slice.map(o => `
      <tr>
        <td><strong style="cursor:pointer;color:var(--c3);" onclick="viewOrder(${ORDERS.indexOf(o)})">${o.id}</strong></td>
        <td>${o.cust}</td>
        <td>${o.prod}</td>
        <td><span class="badge gray">${o.size}</span></td>
        <td><span style="cursor:pointer;" onclick="openStatusChange(${ORDERS.indexOf(o)})">${badge(o.status)}</span></td>
        <td style="color:var(--muted)">${o.date}</td>
        <td>
          <div style="display:flex;gap:6px;">
            <button class="icon-btn" title="View" onclick="viewOrder(${ORDERS.indexOf(o)})">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
            <button class="icon-btn del" title="Delete" onclick="confirmDelete('order',${ORDERS.indexOf(o)})">
              <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
            </button>
          </div>
        </td>
      </tr>`).join('');
      }
      renderPagination('orders-pagination', pages, ordersPage, p => { ordersPage = p; renderOrders(); });
    }

    function viewOrder(idx) {
      const o = ORDERS[idx];
      document.getElementById('od-title').textContent = o.id;
      document.getElementById('od-sub').textContent = `Placed on ${o.date}`;

      let shippingInfo = '';
      if (o.shipping) {
        shippingInfo = `
      <div class="card form-full" style="padding:14px; margin-top:12px;">
        <div class="stat-lbl" style="margin-bottom:8px;">Shipping Information</div>
        <div style="font-size:12.5px; color:var(--text); line-height:1.6;">
          <strong>Email:</strong> ${o.shipping.email}<br>
          <strong>Phone:</strong> ${o.shipping.phone}<br>
          <strong>Address:</strong> ${o.shipping.address}<br>
          <strong>City:</strong> ${o.shipping.city}, ${o.shipping.country} ${o.shipping.zipCode}
        </div>
      </div>
    `;
      }

      let itemsHtml = '';
      if (o.items && Array.isArray(o.items)) {
        itemsHtml = `
          <div class="card form-full" style="padding:14px; margin-top:12px;">
            <div class="stat-lbl" style="margin-bottom:12px;">Order Items (${o.items.length})</div>
            <div style="display:flex; flex-direction:column; gap:12px;">
              ${o.items.map(item => `
                <div style="display:flex; gap:12px; align-items:center; padding-bottom:12px; border-bottom:1px solid var(--border);">
                  <div style="width:50px; height:50px; border-radius:6px; overflow:hidden; background:var(--bg); flex-shrink:0;">
                    <img src="${item.image}" style="width:100%; height:100%; object-fit:cover;" alt="${item.name}">
                  </div>
                  <div style="flex:1; min-width:0;">
                    <div style="font-size:13.5px; font-weight:700; color:var(--c5); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">${item.name}</div>
                    <div style="font-size:11.5px; color:var(--muted); margin-top:2px; display:flex; gap:8px; align-items:center;">
                      <span>Size: <strong>${item.size || 'N/A'}</strong></span>
                      <span>Qty: <strong>${item.quantity || 1}</strong></span>
                      <span style="display:flex; align-items:center; gap:4px;">
                        Color: <span style="width:10px; height:10px; border-radius:50%; background:${item.color}; border:1px solid var(--border);"></span>
                      </span>
                    </div>
                  </div>
                  <div style="font-size:13.5px; font-weight:700; color:var(--c4);">$${(parseFloat(item.price) * (item.quantity || 1)).toFixed(2)}</div>
                </div>
              `).join('')}
            </div>
          </div>
        `;
      }

      document.getElementById('od-body').innerHTML = `
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
      <div class="card" style="padding:14px;"><div class="stat-lbl">Customer</div><div style="font-size:13.5px;font-weight:700;color:var(--c5);margin-top:4px;">${o.cust}</div></div>
      <div class="card" style="padding:14px;"><div class="stat-lbl">Total Amount</div><div style="font-size:13.5px;font-weight:700;color:var(--c4);margin-top:4px;">${o.price}</div></div>
      <div class="card" style="padding:14px;"><div class="stat-lbl">Status</div><div style="margin-top:4px;">${badge(o.status)}</div></div>
      <div class="card" style="padding:14px;"><div class="stat-lbl">Total Items</div><div style="font-size:13.5px;font-weight:700;color:var(--c5);margin-top:4px;">${o.qty}</div></div>
      ${itemsHtml}
      ${shippingInfo}
    </div>`;
      openModal('modal-orderdetail');
    }

    function openStatusChange(idx) {
      document.getElementById('cs-idx').value = idx;
      document.getElementById('cs-sub').textContent = `Changing status for ${ORDERS[idx].id}`;
      document.getElementById('cs-status').value = ORDERS[idx].status;
      openModal('modal-changestatus');
    }

    function applyStatusChange() {
      const idx = parseInt(document.getElementById('cs-idx').value);
      ORDERS[idx].status = document.getElementById('cs-status').value;
      saveOrders();
      closeModal('modal-changestatus');
      renderOrders();
      showToast('Status updated', 'success');
    }

    function openNewOrder() {
      /* populate product dropdown from current PRODUCTS list */
      const sel = document.getElementById('ao-prod');
      sel.innerHTML = '<option value="">Select product…</option>';
      PRODUCTS.forEach(p => {
        const opt = document.createElement('option');
        opt.value = p.name;
        opt.textContent = `${p.name} (${p.cat}) — ${p.price}`;
        sel.appendChild(opt);
      });
      /* reset size dropdown */
      const sizeSel = document.getElementById('ao-size');
      sizeSel.innerHTML = '<option value="">— select a product first —</option>';
      sizeSel.disabled = true;
      /* wire up: when product changes → populate sizes */
      sel.onchange = function () {
        const prodName = this.value;
        sizeSel.innerHTML = '';
        sizeSel.disabled = true;
        if (!prodName) {
          sizeSel.innerHTML = '<option value="">— select a product first —</option>';
          return;
        }
        const prod = PRODUCTS.find(p => p.name === prodName);
        if (!prod || !prod.sizes || Object.keys(prod.sizes).length === 0) {
          sizeSel.innerHTML = '<option value="">No sizes available</option>';
          return;
        }
        Object.entries(prod.sizes).forEach(([size, qty]) => {
          const opt = document.createElement('option');
          opt.value = size;
          opt.textContent = `${size}  (${qty} in stock)`;
          if (qty === 0) opt.disabled = true;
          sizeSel.appendChild(opt);
        });
        sizeSel.disabled = false;
      };
      document.getElementById('ao-date').valueAsDate = new Date();
      openModal('modal-addorder');
    }

    function submitOrder() {
      const cust = document.getElementById('ao-cust').value.trim();
      const email = document.getElementById('ao-email').value.trim();
      const phone = document.getElementById('ao-phone').value.trim();
      const country = document.getElementById('ao-country').value;
      const address = document.getElementById('ao-address').value.trim();
      const city = document.getElementById('ao-city').value.trim();
      const zip = document.getElementById('ao-zip').value.trim();
      const prod = document.getElementById('ao-prod').value;
      const size = document.getElementById('ao-size').value;

      if (!cust || !email || !phone || !country || !address || !city || !zip || !prod) {
        showToast('Please fill all required fields', 'error');
        return;
      }
      if (!size) { showToast('Please select a size', 'error'); return; }

      const newId = '#ORD-' + (1000 + ORDERS.length + 1);
      const orderDate = document.getElementById('ao-date').value
        ? new Date(document.getElementById('ao-date').value + 'T12:00:00')
        : new Date();
      const price = PRODUCTS.find(p => p.name === prod)?.price || '$0.00';

      const orderObj = {
        id: newId, cust, prod, size,
        qty: parseInt(document.getElementById('ao-qty').value) || 1,
        status: 'Processing', // Default status for new manual orders
        price,
        isoDate: orderDate.toISOString(),
        date: orderDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' }),
        shipping: {
          fullName: cust,
          email: email,
          phone: phone,
          address: address,
          city: city,
          country: country,
          zipCode: zip
        }
      };

      ORDERS.unshift(orderObj);
      saveOrders();

      // Also update/add customer
      updateCustomerFromOrder(orderObj);

      closeModal('modal-addorder');
      // Reset form fields
      ['ao-cust', 'ao-email', 'ao-phone', 'ao-address', 'ao-city', 'ao-zip', 'ao-notes'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.value = '';
      });
      document.getElementById('ao-country').value = '';
      document.getElementById('ao-size').innerHTML = '<option value="">— select a product first —</option>';
      document.getElementById('ao-size').disabled = true;

      renderOrders();
      renderOverview();
      showToast(`Order ${newId} created!`, 'success');
    }

    function updateCustomerFromOrder(order) {
      let custIdx = CUSTOMERS.findIndex(c => c.email.toLowerCase() === order.shipping.email.toLowerCase());
      const totalAmount = parseFloat(order.price.replace(/[$,]/g, '') || 0) * (order.qty || 1);

      if (custIdx > -1) {
        CUSTOMERS[custIdx].orders++;
        let currentSpent = parseFloat(CUSTOMERS[custIdx].spent.replace(/[$,]/g, '') || 0);
        CUSTOMERS[custIdx].spent = '$' + (currentSpent + totalAmount).toFixed(2);
        CUSTOMERS[custIdx].status = 'Active';
      } else {
        const colors = ['#a8845e', '#7e5232', '#b39c80', '#c6baa5'];
        CUSTOMERS.push({
          initials: order.cust.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase(),
          name: order.cust,
          email: order.shipping.email,
          loc: order.shipping.city + ', ' + order.shipping.country,
          orders: 1,
          spent: '$' + totalAmount.toFixed(2),
          status: 'Active',
          color: colors[Math.floor(Math.random() * colors.length)]
        });
      }
      saveCustomers();
      renderCustomers();
    }

    function sortTable(table, col) {
      if (table === 'orders') {
        if (orderSort.col === col) orderSort.dir *= -1; else { orderSort.col = col; orderSort.dir = 1; }
        renderOrders();
      } else {
        if (customerSort.col === col) customerSort.dir *= -1; else { customerSort.col = col; customerSort.dir = 1; }
        renderCustomers();
      }
    }

    /* ════════════════════════════════════════════
       PRODUCTS GRID — dynamic add/edit/delete
    ════════════════════════════════════════════ */
    function renderCatCounts() {
      const bar = document.getElementById('cat-counts-bar');
      if (!bar) return;
      bar.innerHTML = CATS.map(cat => {
        const prods = PRODUCTS.filter(p => p.cat === cat);
        const count = prods.length;
        const stock = prods.reduce((a, p) => a + calcStock(p), 0);
        return `<div class="stat-card" style="cursor:pointer;border:2px solid transparent;transition:all var(--trans);"
      onclick="document.getElementById('products-cat-filter').value='${cat}';renderProducts();"
      onmouseover="this.style.borderColor='var(--c3)'" onmouseout="this.style.borderColor='transparent'">
      <div style="font-size:24px;">${CAT_EMOJIS[cat] || '📦'}</div>
      <div>
        <div class="stat-lbl">${cat}</div>
        <div class="stat-val" style="font-size:20px;">${count}</div>
        <div style="font-size:11px;color:var(--muted);margin-top:2px;">${stock} units in stock</div>
      </div>
    </div>`;
      }).join('');
    }

    function renderProducts() {
      renderCatCounts();
      const q = (document.getElementById('products-search')?.value || '').toLowerCase();
      const cf = document.getElementById('products-cat-filter')?.value || '';
      const filtered = PRODUCTS.filter(p => {
        const matchQ = !q || (p.name + p.cat).toLowerCase().includes(q);
        const matchC = !cf || p.cat === cf;
        return matchQ && matchC;
      });
      const countSub = document.getElementById('products-count-sub');
      if (countSub) countSub.textContent = `${filtered.length} product${filtered.length !== 1 ? 's' : ''} in catalogue`;
      if (!filtered.length) {
        document.getElementById('productGrid').innerHTML = `<div class="empty-state" style="grid-column:1/-1;"><div class="empty-icon">📦</div><div class="empty-title">No products found</div><div class="empty-sub">Try a different search term</div></div>`;
        return;
      }
      document.getElementById('productGrid').innerHTML = filtered.map(p => {
        const realIdx = PRODUCTS.indexOf(p);
        const stock = calcStock(p);
        const stockColor = stock < 20 ? '#c0392b' : stock < 50 ? '#c9620e' : '#2d8a5a';
        const placements = (p.placementLabels || p.placements || []);
        const placementBadge = placements.length > 0
          ? `<div style="font-size:10px;color:var(--c3);font-weight:700;margin-top:4px;">📍 ${placements.join(' · ')}</div>`
          : `<div style="font-size:10px;color:var(--muted);margin-top:4px;">Click to set display sections</div>`;
        return `<div class="prod-card" onclick="openPlacement(${realIdx})" title="Click to set display placement">
      <div class="prod-thumb" style="background:var(--bg);overflow:hidden;">
        ${p.imageUrl
            ? `<img src="${p.imageUrl}" style="width:100%;height:100%;object-fit:cover;" alt="${p.name}"/>`
            : `<div style="display:flex;flex-direction:column;align-items:center;gap:6px;color:var(--muted);">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <span style="font-size:11px;">No photo</span>
            </div>`}
      </div>
      <div class="prod-body">
        <div class="prod-name">${p.name}</div>
        <div class="prod-cat">${p.cat} &bull; <span style="color:${stockColor};font-weight:700;">${stock} in stock</span></div>
        ${placementBadge}
        <div class="prod-foot" style="margin-top:8px;">
          <div class="prod-price">${p.price}</div>
          <div class="prod-actions" onclick="event.stopPropagation()">
            <button class="icon-btn" title="Edit" onclick="editProduct(${realIdx})">
              <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </button>
            <button class="icon-btn del" title="Delete" onclick="confirmDelete('product',${realIdx})">
              <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
            </button>
          </div>
        </div>
      </div>
    </div>`;
      }).join('');
    }

    function editProduct(idx) {
      const p = PRODUCTS[idx];
      document.getElementById('ep-idx').value = idx;
      document.getElementById('editprod-sub').textContent = `Editing: ${p.name}`;
      document.getElementById('ep-name').value = p.name;
      document.getElementById('ep-cat').value = p.cat;
      document.getElementById('ep-price').value = p.price.replace('$', '');
      openModal('modal-editproduct');
    }

    function saveEditProduct() {
      const idx = parseInt(document.getElementById('ep-idx').value);
      const price = document.getElementById('ep-price').value;
      PRODUCTS[idx] = {
        ...PRODUCTS[idx],
        name: document.getElementById('ep-name').value,
        cat: document.getElementById('ep-cat').value,
        price: '$' + parseFloat(price || 0).toFixed(2),
      };
      saveProducts();
      closeModal('modal-editproduct');
      renderProducts();
      renderOverview();
      showToast('Product updated!', 'success');
    }

    /* ════════════════════════════════════════════
       PRODUCT DISPLAY PLACEMENT
    ════════════════════════════════════════════ */
    const PLACEMENT_OPTIONS = [
      { id: 'men', icon: '👔', label: 'Men', desc: 'Show in the Men category' },
      { id: 'women', icon: '👗', label: 'Women', desc: 'Show in the Women category' },
      { id: 'kids', icon: '🧒', label: 'Kids', desc: 'Show in the Kids category' },
      { id: 'acc', icon: '🎩', label: 'Accessories', desc: 'Show in the Accessories category' },
      { id: 'bestseller', icon: '⭐', label: 'Best Seller', desc: 'Feature in the Best Sellers section' },
      { id: 'winter', icon: '❄️', label: 'Winter Collection', desc: 'Feature in the Winter Collection' },
      { id: 'summer', icon: '☀️', label: 'Summer Collection', desc: 'Show in the Summer Collection' },
      { id: 'new', icon: '✨', label: 'New Arrivals', desc: 'Show in the homepage New Arrivals' },
    ];

    function renderAddProductPlacements() {
      const container = document.getElementById('add-placement-options');
      if (!container) return;
      container.innerHTML = PLACEMENT_OPTIONS.map(o => `
        <label style="display:flex;align-items:center;gap:8px;padding:8px 12px;background:var(--bg);border:1px solid var(--border);border-radius:var(--radius-sm);cursor:pointer;transition:all var(--trans);">
          <input type="checkbox" name="placements" value="${o.id}" style="width:16px;height:16px;accent-color:var(--c3);">
          <div style="font-size:18px;">${o.icon}</div>
          <div style="font-size:13px;font-weight:600;color:var(--c5);">${o.label}</div>
        </label>
      `).join('');
    }

    function openPlacement(idx) {
      const p = PRODUCTS[idx];
      document.getElementById('placement-idx').value = idx;
      document.getElementById('placement-title').textContent = p.name;
      document.getElementById('placement-sub').textContent = 'Choose where to display this product on the storefront';
      const current = p.placements || [];
      document.getElementById('placement-options').innerHTML = PLACEMENT_OPTIONS.map(o => {
        const active = current.includes(o.id);
        return `<div class="placement-row${active ? ' checked' : ''}" onclick="togglePlacement(this,'${o.id}')">
      <div class="placement-check">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div class="placement-icon">${o.icon}</div>
      <div>
        <div class="placement-label">${o.label}</div>
        <div class="placement-desc">${o.desc}</div>
      </div>
    </div>`;
      }).join('');
      openModal('modal-placement');
    }

    function togglePlacement(row, id) {
      row.classList.toggle('checked');
    }

    function savePlacement() {
      const idx = parseInt(document.getElementById('placement-idx').value);
      const checked = [...document.querySelectorAll('#placement-options .placement-row.checked')];
      const ids = checked.map(r => {
        /* find label text */
        return r.querySelector('.placement-label').textContent;
      });
      PRODUCTS[idx].placements = checked.map(r => {
        const opt = PLACEMENT_OPTIONS.find(o => r.querySelector('.placement-label').textContent === o.label);
        return opt ? opt.id : '';
      }).filter(Boolean);
      PRODUCTS[idx].placementLabels = ids;
      saveProducts();
      closeModal('modal-placement');
      renderProducts();
      showToast(`Placement saved for "${PRODUCTS[idx].name}"!`, 'success');
    }

    /* ════════════════════════════════════════════
       CUSTOMERS TABLE
    ════════════════════════════════════════════ */
    function getFilteredCustomers() {
      const q = (document.getElementById('customers-search')?.value || '').toLowerCase();
      const sf = document.getElementById('customers-status-filter')?.value || '';
      let data = CUSTOMERS.filter(c => {
        const match = !q || (c.name + c.email + c.loc).toLowerCase().includes(q);
        const statusMatch = !sf || c.status === sf;
        return match && statusMatch;
      });
      if (customerSort.col) {
        data = [...data].sort((a, b) => {
          let va = a[customerSort.col], vb = b[customerSort.col];
          if (customerSort.col === 'spent') { va = parseFloat(va.replace(/[$,]/g, '') || 0); vb = parseFloat(vb.replace(/[$,]/g, '') || 0); }
          return (va < vb ? -1 : va > vb ? 1 : 0) * customerSort.dir;
        });
      }
      return data;
    }

    function filterCustomers() { customersPage = 1; renderCustomers(); }

    function renderCustomers() {
      const data = getFilteredCustomers();
      const total = data.length;
      const pages = Math.max(1, Math.ceil(total / PAGE_SIZE));
      if (customersPage > pages) customersPage = pages;
      const slice = data.slice((customersPage - 1) * PAGE_SIZE, customersPage * PAGE_SIZE);

      document.getElementById('customers-count-sub').textContent = `${total} customer${total !== 1 ? 's' : ''} found`;

      if (!slice.length) {
        document.getElementById('customersTbody').innerHTML = `<tr><td colspan="7"><div class="empty-state"><div class="empty-icon">👥</div><div class="empty-title">No customers found</div><div class="empty-sub">Try adjusting your search</div></div></td></tr>`;
      } else {
        document.getElementById('customersTbody').innerHTML = slice.map(c => `
      <tr>
        <td>
          <div class="cust-cell">
            <div class="cust-av" style="background:${c.color}">${c.initials}</div>
            <div><div class="cust-name">${c.name}</div><div class="cust-join">${c.loc}</div></div>
          </div>
        </td>
        <td style="color:var(--muted)">${c.email}</td>
        <td style="color:var(--muted)">${c.loc}</td>
        <td><strong>${c.orders}</strong></td>
        <td style="font-weight:700;color:var(--c4)">${c.spent}</td>
        <td>${badge(c.status)}</td>
        <td>
          <div style="display:flex;gap:6px;">
            <button class="icon-btn" title="View" onclick="viewCustomer(${CUSTOMERS.indexOf(c)})">
              <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
            <button class="icon-btn" title="Edit" onclick="editCustomer(${CUSTOMERS.indexOf(c)})">
              <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </button>
            <button class="icon-btn del" title="Delete" onclick="confirmDelete('customer',${CUSTOMERS.indexOf(c)})">
              <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
            </button>
          </div>
        </td>
      </tr>`).join('');
      }
      renderPagination('customers-pagination', pages, customersPage, p => { customersPage = p; renderCustomers(); });
    }

    function viewCustomer(idx) {
      const c = CUSTOMERS[idx];
      document.getElementById('vc-av').textContent = c.initials;
      document.getElementById('vc-av').style.background = c.color;
      document.getElementById('vc-name').textContent = c.name;
      document.getElementById('vc-role').textContent = c.status + ' Customer';
      document.getElementById('vc-email').textContent = c.email;
      document.getElementById('vc-loc').textContent = c.loc;
      document.getElementById('vc-orders').textContent = c.orders;
      document.getElementById('vc-spent').textContent = c.spent;
      openModal('modal-viewcustomer');
    }

    function editCustomer(idx) {
      const c = CUSTOMERS[idx];
      document.getElementById('ec-idx').value = idx;
      document.getElementById('editcustomer-sub').textContent = `Editing: ${c.name}`;
      document.getElementById('ec-name').value = c.name;
      document.getElementById('ec-email').value = c.email;
      document.getElementById('ec-loc').value = c.loc;
      document.getElementById('ec-orders').value = c.orders;
      document.getElementById('ec-spent').value = c.spent;
      document.getElementById('ec-status').value = c.status;
      openModal('modal-editcustomer');
    }

    function saveEditCustomer() {
      const idx = parseInt(document.getElementById('ec-idx').value);
      const name = document.getElementById('ec-name').value;
      CUSTOMERS[idx] = {
        ...CUSTOMERS[idx],
        name,
        initials: name.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase(),
        email: document.getElementById('ec-email').value,
        loc: document.getElementById('ec-loc').value,
        orders: parseInt(document.getElementById('ec-orders').value) || 0,
        spent: document.getElementById('ec-spent').value,
        status: document.getElementById('ec-status').value,
      };
      saveCustomers();
      closeModal('modal-editcustomer');
      renderCustomers();
      renderOverview();
      showToast('Customer updated!', 'success');
    }

    function submitCustomer() {
      const name = document.getElementById('ac-name').value.trim();
      const email = document.getElementById('ac-email').value.trim();
      if (!name || !email) { showToast('Name and email are required', 'error'); return; }
      const colors = ['#a8845e', '#7e5232', '#b39c80', '#c6baa5'];
      CUSTOMERS.push({
        initials: name.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase(),
        name, email,
        loc: document.getElementById('ac-loc').value || '—',
        orders: 0, spent: '$0',
        status: document.getElementById('ac-status').value,
        color: colors[Math.floor(Math.random() * colors.length)],
      });
      saveCustomers();
      closeModal('modal-addcustomer');
      document.getElementById('ac-name').value = '';
      document.getElementById('ac-email').value = '';
      document.getElementById('ac-loc').value = '';
      renderCustomers();
      renderOverview();
      showToast(`Customer ${name} added!`, 'success');
    }

    /* ════════════════════════════════════════════
       ANALYTICS
    ════════════════════════════════════════════ */
    function renderAnalytics() {
      document.getElementById('analyticsCards').innerHTML = [
        { val: '$84.2K', lbl: 'Total Sales (YTD)', chg: '▲ +12.4% vs last year' },
        { val: '1,348', lbl: 'Total Orders', chg: '▲ +8.1% vs last year' },
        { val: '$62.50', lbl: 'Avg. Order Value', chg: '▲ +3.9% vs last year' },
        { val: '78%', lbl: 'Customer Retention', chg: '▼ -1.2% vs last year' },
        { val: '329', lbl: 'New Customers', chg: '▼ -2.3% vs last year' },
        { val: '4.8★', lbl: 'Avg. Product Rating', chg: '▲ +0.2 vs last year' },
      ].map(a => `<div class="an-card"><div class="an-val">${a.val}</div><div class="an-lbl">${a.lbl}</div><div class="an-chg">${a.chg}</div></div>`).join('');

      document.getElementById('catChart').innerHTML = CAT_LABELS.map((l, i) => `
    <div class="bar-col"><div class="bar" style="height:${CAT_PCT[i]}%"></div><div class="bar-lbl">${l}</div></div>`).join('');

      document.getElementById('topProdTbody').innerHTML = TOP_PROD.map(p => `
    <tr><td style="font-weight:600">${p.name}</td><td>${p.units}</td><td style="font-weight:700;color:var(--c4)">${p.rev}</td></tr>`).join('');
    }

    /* ════════════════════════════════════════════
       PAGINATION
    ════════════════════════════════════════════ */
    function renderPagination(containerId, pages, current, onPage) {
      const el = document.getElementById(containerId);
      if (pages <= 1) { el.innerHTML = ''; return; }
      let html = `<span class="page-info">Page ${current} of ${pages}</span>`;
      html += `<button class="page-btn" ${current === 1 ? 'disabled' : ''} onclick="(${onPage.toString()})(${current - 1})"><svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg></button>`;
      for (let i = 1; i <= pages; i++) {
        if (i === 1 || i === pages || Math.abs(i - current) <= 1) {
          html += `<button class="page-btn ${i === current ? 'active' : ''}" onclick="(${onPage.toString()})(${i})">${i}</button>`;
        } else if (Math.abs(i - current) === 2) {
          html += `<span style="color:var(--muted);font-size:12px;padding:0 2px;">…</span>`;
        }
      }
      html += `<button class="page-btn" ${current === pages ? 'disabled' : ''} onclick="(${onPage.toString()})(${current + 1})"><svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg></button>`;
      el.innerHTML = html;
    }

    /* ════════════════════════════════════════════
       DELETE CONFIRM
    ════════════════════════════════════════════ */
    function confirmDelete(type, idx) {
      const labels = { order: 'Delete Order', product: 'Delete Product', customer: 'Delete Customer' };
      const msgs = { order: `Delete ${ORDERS[idx]?.id}? This cannot be undone.`, product: `Delete "${PRODUCTS[idx]?.name}"? This cannot be undone.`, customer: `Delete "${CUSTOMERS[idx]?.name}"? This cannot be undone.` };
      document.getElementById('confirm-title').textContent = labels[type];
      document.getElementById('confirm-msg').textContent = msgs[type];
      document.getElementById('confirm-icon').className = 'confirm-icon';
      document.getElementById('confirm-action-btn').onclick = () => {
        if (type === 'order') { ORDERS.splice(idx, 1); saveOrders(); }
        else if (type === 'product') { PRODUCTS.splice(idx, 1); saveProducts(); }
        else if (type === 'customer') { CUSTOMERS.splice(idx, 1); saveCustomers(); }
        closeModal('modal-confirm');
        renderOrders(); renderProducts(); renderCustomers(); renderOverview();
        showToast('Deleted successfully', 'success');
      };
      openModal('modal-confirm');
    }

    function confirmAction(msg, action) {
      document.getElementById('confirm-title').textContent = 'Are you sure?';
      document.getElementById('confirm-msg').textContent = msg;
      document.getElementById('confirm-icon').className = 'confirm-icon';
      document.getElementById('confirm-action-btn').onclick = () => {
        closeModal('modal-confirm');
        window[action] && window[action]();
      };
      openModal('modal-confirm');
    }

    function clearOrders() { ORDERS = []; saveOrders(); renderOrders(); renderOverview(); showToast('All orders cleared', 'success'); }
    function resetData() {
      if (confirm('This will clear all orders, products and customers from your dashboard. Are you sure?')) {
        localStorage.removeItem('dashboard_orders');
        localStorage.removeItem('dashboard_products');
        localStorage.removeItem('dashboard_customers');
        location.reload();
      }
    }

    function confirmDiscard() {
      confirmAction('Discard all unsaved product data?', 'resetForm');
    }

    /* ════════════════════════════════════════════
       ADD PRODUCT FORM
    ════════════════════════════════════════════ */
    const ALL_SIZES = ['XS', 'S', 'M', 'L', 'XL'];
    let activeSizes = [];
    let colorCount = 0;

    function initAddProduct() {
      const picker = document.getElementById('sizePicker');
      if (picker && !picker.children.length) {
        picker.innerHTML = ALL_SIZES.map(s => `<div class="size-pill" data-size="${s}" onclick="toggleSize(this)">${s}</div>`).join('');
      }
      renderAddProductPlacements();
      if (!colorCount) addColor();
      
      if (activeSizes.length === 0) {
        ['S', 'M', 'L', 'XL'].forEach(s => toggleSize(s));
      }
    }

    function toggleSize(el) {
      if (typeof el === 'string') {
        const picker = document.getElementById('sizePicker');
        const pill = [...picker.querySelectorAll('.size-pill')].find(p => p.dataset.size === el);
        if (pill) {
          pill.classList.add('active');
          if (!activeSizes.includes(el)) activeSizes.push(el);
        } else {
          // It's a custom size
          if (!activeSizes.includes(el)) activeSizes.push(el);
          const newPill = document.createElement('div');
          newPill.className = 'size-pill active';
          newPill.dataset.size = el;
          newPill.textContent = el;
          newPill.onclick = () => toggleSize(newPill);
          picker.appendChild(newPill);
        }
        renderSizeTable();
        return;
      }
      const s = el.dataset.size;
      el.classList.toggle('active');
      if (el.classList.contains('active')) { if (!activeSizes.includes(s)) activeSizes.push(s); }
      else { activeSizes = activeSizes.filter(x => x !== s); }
      renderSizeTable();
    }

    function renderSizeTable() {
      const wrap = document.getElementById('sizeTableWrap');
      if (!activeSizes.length) { wrap.innerHTML = ''; updateTotalStock(); return; }
      wrap.innerHTML = `
    <div class="size-table-head"><span>Size</span><span>Qty</span><span>Chest (cm)</span><span class="meas-input">Length (cm)</span><span></span></div>
    ${activeSizes.map(s => `
    <div class="size-row">
      <div><span class="size-tag">${s}</span></div>
      <input class="size-qty-input form-input" type="number" min="0" placeholder="0" style="padding:6px 9px" oninput="updateTotalStock()"/>
      <input class="form-input" type="number" min="0" placeholder="0" style="padding:6px 9px"/>
      <input class="form-input meas-input" type="number" min="0" placeholder="0" style="padding:6px 9px"/>
      <button type="button" class="remove-size" onclick="removeSize('${s}')">
        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>`).join('')}`;
      updateTotalStock();
    }

    function updateTotalStock() {
      const inputs = document.querySelectorAll('.size-qty-input');
      let total = 0;
      inputs.forEach(inp => total += (parseInt(inp.value) || 0));
      const el = document.getElementById('totalStockDisplay');
      if (el) el.textContent = total.toLocaleString();
    }

    function removeSize(s) {
      activeSizes = activeSizes.filter(x => x !== s);
      document.querySelectorAll('.size-pill').forEach(p => { if (p.dataset.size === s) p.classList.remove('active'); });
      renderSizeTable();
    }

    function addCustomSize() {
      const val = prompt('Enter custom size label (e.g. XXL, 2XL):');
      if (!val || !val.trim()) return;
      const label = val.trim().toUpperCase();
      if (activeSizes.includes(label)) { showToast('Size already added'); return; }
      activeSizes.push(label);
      const picker = document.getElementById('sizePicker');
      if (![...picker.querySelectorAll('.size-pill')].find(p => p.dataset.size === label)) {
        const pill = document.createElement('div');
        pill.className = 'size-pill active';
        pill.dataset.size = label;
        pill.textContent = label;
        pill.onclick = () => toggleSize(pill);
        picker.appendChild(pill);
      }
      renderSizeTable();
    }

    function addColor() {
      colorCount++;
      const id = 'clr' + colorCount;
      const defaults = ['#2f2716', '#a8845e', '#c6baa5', '#ffffff', '#1a1a2e', '#e8d5b7'];
      const c = defaults[(colorCount - 1) % defaults.length];
      const div = document.createElement('div');
      div.className = 'color-entry'; div.id = id;
      div.innerHTML = `
    <div class="color-swatch" style="background:${c}">
      <input type="color" value="${c}" oninput="this.parentElement.style.background=this.value"/>
    </div>
    <input class="color-name-inp" type="text" placeholder="Color name"/>
    <button type="button" class="rem-color" onclick="document.getElementById('${id}').remove()">
      <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>`;
      document.getElementById('colorList').appendChild(div);
    }

    function previewImage(input) {
      if (!input.files || !input.files[0]) return;
      const reader = new FileReader();
      reader.onload = e => {
        document.getElementById('filePreview').innerHTML = `
      <img src="${e.target.result}" style="max-height:120px;border-radius:8px;margin:0 auto;display:block;"/>
      <p style="margin-top:8px;font-size:12px;">${input.files[0].name}</p>`;
      };
      reader.readAsDataURL(input.files[0]);
    }

    function submitProduct(e) {
      e.preventDefault();
      const fd = new FormData(e.target);
      const data = Object.fromEntries(fd.entries());
      const price = parseFloat(data.price || 0);
      /* collect sizes from the size table */
      const sizeRows = document.querySelectorAll('#sizeTableWrap .size-row');
      const sizes = {};
      sizeRows.forEach(row => {
        const tag = row.querySelector('.size-tag');
        const qtyInput = row.querySelectorAll('input')[0];
        if (tag && qtyInput) sizes[tag.textContent.trim()] = parseInt(qtyInput.value) || 0;
      });

      /* collect placements */
      const placements = [...document.querySelectorAll('#add-placement-options input[name="placements"]:checked')].map(cb => cb.value);

      if (placements.length === 0) {
        showToast('Please select at least one storefront placement', 'error');
        return;
      }

      /* determine primary category from placements for dashboard listing */
      let primaryCat = 'Uncategorized';
      if (placements.includes('men')) primaryCat = 'Men';
      else if (placements.includes('women')) primaryCat = 'Women';
      else if (placements.includes('kids')) primaryCat = 'Kids';
      else if (placements.includes('acc')) primaryCat = 'Accessories';

      /* capture image BEFORE resetForm clears preview */
      const previewImg = document.querySelector('#filePreview img');
      const imageUrl = previewImg ? previewImg.src : '';

      /* collect colors from the color list */
      const colorEntries = document.querySelectorAll('#colorList .color-entry');
      const colors = [];
      colorEntries.forEach(entry => {
        const colorInput = entry.querySelector('input[type="color"]');
        if (colorInput) {
          colors.push(colorInput.value);
        }
      });

      PRODUCTS.push({
        id: 'P' + (Date.now()),
        name: data.name || 'New Product',
        cat: primaryCat,
        price: '$' + price.toFixed(2),
        priceValue: price,
        sizes,
        colors,
        imageUrl,
        placements,
        badge: 'New' // default badge for dashboard products
      });
      saveProducts();

      /* navigate first, then render so the grid is visible and populated */
      nav(document.querySelector('[data-sec=products]'));
      renderProducts();
      renderOverview();
      resetForm();
      showToast('Product saved successfully!', 'success');
    }

    function resetForm() {
      const form = document.getElementById('addProductForm');
      if (form) form.reset();
      const fp = document.getElementById('filePreview');
      if (fp) fp.innerHTML = `
    <div class="file-zone-icon">🖼️</div>
    <p><span>Click to upload</span> or drag &amp; drop</p>
    <p style="font-size:11px;margin-top:4px;">PNG, JPG, WEBP up to 5MB</p>`;
      activeSizes = [];
      document.querySelectorAll('.size-pill').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('#add-placement-options input[type="checkbox"]').forEach(cb => cb.checked = false);
      const wrap = document.getElementById('sizeTableWrap');
      if (wrap) wrap.innerHTML = '';
      
      // Re-initialize standard sizes
      ['S', 'M', 'L', 'XL'].forEach(s => toggleSize(s));
      
      const totalEl = document.getElementById('totalStockDisplay');
      if (totalEl) totalEl.textContent = '0';
      const cl = document.getElementById('colorList');
      if (cl) { cl.innerHTML = ''; colorCount = 0; addColor(); }
    }

    /* ════════════════════════════════════════════
       SETTINGS
    ════════════════════════════════════════════ */
    function doSaveSettings() {
      closeModal('modal-savesettings');
      showToast('Settings saved successfully!', 'success');
    }

    /* ════════════════════════════════════════════
       EXPORT
    ════════════════════════════════════════════ */
    function doExport() {
      const dataset = document.getElementById('exp-dataset').value;
      const format = document.getElementById('exp-format').value;
      closeModal('modal-export');
      showToast(`Exporting ${dataset} as ${format}…`, 'success');
    }

    /* ════════════════════════════════════════════
       NOTIFICATIONS
    ════════════════════════════════════════════ */
    function markAllRead() {
      document.querySelectorAll('.notif-unread').forEach(el => el.classList.remove('notif-unread'));
      document.getElementById('notif-dot').style.display = 'none';
      showToast('All notifications marked as read', 'success');
    }

    /* ════════════════════════════════════════════
       MESSAGES
    ════════════════════════════════════════════ */
    function sendMessage() {
      const inp = document.getElementById('msg-input');
      const txt = inp.value.trim();
      if (!txt) return;
      const list = document.getElementById('messages-list');
      const div = document.createElement('div');
      div.style.cssText = 'display:flex;gap:10px;flex-direction:row-reverse;';
      div.innerHTML = `
    <div class="cust-av" style="background:var(--c4);font-size:11px;">AM</div>
    <div style="background:var(--c3);border-radius:10px 0 10px 10px;padding:10px 13px;flex:1;">
      <div style="font-size:12px;font-weight:700;color:rgba(255,255,255,.8);">You</div>
      <div style="font-size:12.5px;color:#fff;margin-top:2px;">${txt}</div>
      <div style="font-size:11px;color:rgba(255,255,255,.6);margin-top:5px;">now</div>
    </div>`;
      list.appendChild(div);
      list.scrollTop = list.scrollHeight;
      inp.value = '';
    }

    /* ════════════════════════════════════════════
       NAVIGATION
    ════════════════════════════════════════════ */
    const PAGE_META = {
      overview: { title: 'Dashboard Overview', sub: "Welcome back — here's your store at a glance" },
      orders: { title: 'Orders', sub: 'Track and manage all customer orders' },
      products: { title: 'Products', sub: 'Your clothing catalogue' },
      addproduct: { title: 'Add New Product', sub: 'List a new clothing item' },
      customers: { title: 'Customers', sub: 'Manage your customer base' },
      analytics: { title: 'Analytics', sub: 'Performance overview' },
      settings: { title: 'Settings', sub: 'Store preferences and configuration' },
    };

    function nav(el) {
      const sec = el.dataset.sec;
      document.querySelectorAll('.sb-item').forEach(i => i.classList.remove('active'));
      el.classList.add('active');
      document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
      document.getElementById('sec-' + sec).classList.add('active');
      const m = PAGE_META[sec];
      document.getElementById('pgTitle').textContent = m.title;
      document.getElementById('pgSub').textContent = m.sub;
      if (sec === 'addproduct') initAddProduct();
      if (sec === 'products') renderProducts();
      closeMob();
    }

    /* ════════════════════════════════════════════
       SIDEBAR
    ════════════════════════════════════════════ */
    function toggleSidebar() { document.getElementById('sidebar').classList.toggle('collapsed'); }
    function openMob() { document.getElementById('sidebar').classList.add('mob-open'); document.getElementById('mobOverlay').classList.add('active'); }
    function closeMob() { document.getElementById('sidebar').classList.remove('mob-open'); document.getElementById('mobOverlay').classList.remove('active'); }

    /* ════════════════════════════════════════════
       TOAST
    ════════════════════════════════════════════ */
    let toastTimer;
    function showToast(msg, type = '') {
      const t = document.getElementById('toast');
      document.getElementById('toastMsg').textContent = msg;
      t.className = 'toast' + (type ? ' toast-' + type : '');
      t.classList.add('show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => t.classList.remove('show'), 2800);
    }

    /* ════════════════════════════════════════════
       INIT
    ════════════════════════════════════════════ */
    renderOverview();
    renderOrders();
    renderProducts();
    renderCustomers();
    renderAnalytics();
  </script>
</body>

</html>
