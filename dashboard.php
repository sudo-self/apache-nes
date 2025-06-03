<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocalDev Console | macOS Apache/PHP Server</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #c7d2fe;
            --secondary: #10b981;
            --secondary-dark: #059669;
            --danger: #ef4444;
            --danger-dark: #dc2626;
            --warning: #f59e0b;
            --warning-dark: #d97706;
            --info: #3b82f6;
            --success: #10b981;
            --light: #f8fafc;
            --dark: #0f172a;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --gray-dark: #475569;
            --bg-color: #f1f5f9;
            --text-color: #1e293b;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --sidebar-bg: #ffffff;
            --header-bg: #ffffff;
            --border-color: #e2e8f0;
            --border-radius: 0.75rem;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --code-bg: #f1f5f9;
            --table-header: #f8fafc;
            --table-row: #ffffff;
            --table-row-alt: #f8fafc;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark-mode {
            --primary: #818cf8;
            --primary-dark: #6366f1;
            --primary-light: #3730a3;
            --secondary: #34d399;
            --secondary-dark: #10b981;
            --danger: #f87171;
            --danger-dark: #ef4444;
            --warning: #fbbf24;
            --warning-dark: #f59e0b;
            --info: #60a5fa;
            --success: #34d399;
            --bg-color: #0f172a;
            --text-color: #e2e8f0;
            --text-muted: #94a3b8;
            --card-bg: #1e293b;
            --sidebar-bg: #1e293b;
            --header-bg: #1e293b;
            --border-color: #334155;
            --code-bg: #334155;
            --table-header: #1e293b;
            --table-row: #1e293b;
            --table-row-alt: #334155;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.24);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: var(--transition);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            padding: 1.5rem;
            transition: var(--transition);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
            background-color: var(--bg-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .logo-icon {
            font-size: 2rem;
            color: var(--primary);
        }

        .dark-mode-toggle {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-sm);
        }

        .dark-mode-toggle:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title i {
            font-size: 1.1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            box-shadow: var(--shadow-sm);
            white-space: nowrap;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
        }

        .btn-secondary {
            background: var(--gray-light);
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background: var(--gray);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
        }

        .btn-danger:hover {
            background: var(--danger-dark);
        }

        .btn-warning {
            background: var(--warning);
        }

        .btn-warning:hover {
            background: var(--warning-dark);
        }

        .btn-success {
            background: var(--success);
        }

        .btn-success:hover {
            background: var(--secondary-dark);
        }

        .btn-group {
            display: flex;
            gap: 0.5rem;
        }

        .server-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            background: var(--code-bg);
            padding: 1rem;
            border-radius: 0.5rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.875rem;
            overflow-x: auto;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .info-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-label i {
            font-size: 0.9rem;
        }

        .file-browser {
            width: 100%;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .file-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .file-table th {
            background-color: var(--table-header);
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .file-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .file-table tr:last-child td {
            border-bottom: none;
        }

        .file-table tr:nth-child(even) {
            background-color: var(--table-row-alt);
        }

        .file-table tr:hover {
            background-color: var(--code-bg);
        }

        .file-icon {
            margin-right: 0.5rem;
            color: var(--primary);
            width: 1.25rem;
            text-align: center;
        }

        .file-action {
            color: var(--gray);
            margin-left: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .file-action:hover {
            color: var(--primary);
            transform: scale(1.1);
        }

        .file-action-danger:hover {
            color: var(--danger);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            flex-wrap: wrap;
        }

        .breadcrumb-item {
            color: var(--primary);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .breadcrumb-item:hover {
            text-decoration: underline;
            color: var(--primary-dark);
        }

        .breadcrumb-separator {
            color: var(--gray);
            display: flex;
            align-items: center;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .status-active {
            background-color: var(--secondary);
            color: white;
        }

        .status-inactive {
            background-color: var(--gray-light);
            color: var(--text-color);
        }

        .status-warning {
            background-color: var(--warning);
            color: white;
        }

        .sidebar-menu {
            list-style: none;
            margin-top: 1.5rem;
            flex-grow: 1;
        }

        .sidebar-menu li {
            margin-bottom: 0.25rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            color: var(--text-color);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-menu a.active {
            font-weight: 600;
        }

        .sidebar-menu-icon {
            width: 1.25rem;
            text-align: center;
            color: var(--gray);
        }

        .sidebar-menu a:hover .sidebar-menu-icon,
        .sidebar-menu a.active .sidebar-menu-icon {
            color: var(--primary);
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.75rem;
            color: var(--text-muted);
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .tab-container {
            margin-bottom: 1.5rem;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 1rem;
            overflow-x: auto;
        }

        .tab {
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            font-weight: 500;
            transition: var(--transition);
            white-space: nowrap;
            color: var(--text-muted);
            position: relative;
        }

        .tab.active {
            border-bottom-color: var(--primary);
            color: var(--primary);
        }

        .tab:hover:not(.active) {
            background-color: var(--code-bg);
            color: var(--text-color);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .tab-content.active {
            display: block;
        }

        pre {
            background-color: var(--code-bg);
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            font-family: 'Fira Code', monospace;
            font-size: 0.875rem;
            line-height: 1.5;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        code {
            font-family: 'Fira Code', monospace;
            background-color: var(--code-bg);
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            border: 1px solid var(--border-color);
        }

        a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .progress-container {
            margin-top: 1.5rem;
        }

        .progress-bar {
            height: 8px;
            background-color: var(--gray-light);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary);
            border-radius: 4px;
            transition: width 0.5s ease;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .quick-action {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 0.5rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
            cursor: pointer;
        }

        .quick-action:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--primary);
        }

        .quick-action i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .quick-action-title {
            font-weight: 600;
            font-size: 0.875rem;
        }

        .quick-action-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1rem;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .stat-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }

        .stat-change {
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-change.up {
            color: var(--success);
        }

        .stat-change.down {
            color: var(--danger);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .toast {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            background: var(--card-bg);
            color: var(--text-color);
            padding: 1rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            z-index: 1000;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .toast i {
            font-size: 1.25rem;
        }

        .toast.success i {
            color: var(--success);
        }

        .toast.error i {
            color: var(--danger);
        }

        .toast.warning i {
            color: var(--warning);
        }

        .toast.info i {
            color: var(--info);
        }

        .context-menu {
            position: absolute;
            background: var(--card-bg);
            border-radius: 0.5rem;
            box-shadow: var(--shadow-lg);
            z-index: 100;
            min-width: 200px;
            border: 1px solid var(--border-color);
            display: none;
        }

        .context-menu-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: var(--transition);
        }

        .context-menu-item:hover {
            background: var(--code-bg);
            color: var(--primary);
        }

        .context-menu-item i {
            width: 1.25rem;
            text-align: center;
        }

        .context-menu-divider {
            height: 1px;
            background: var(--border-color);
            margin: 0.25rem 0;
        }

        @media (max-width: 1024px) {
            .sidebar {
                width: 240px;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--border-color);
            }
            
            .main-content {
                padding: 1.5rem;
            }
            
            .server-info-grid, .quick-actions, .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-server logo-icon"></i>
            <span>LocalDev</span>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="#" class="active">
                    <i class="fas fa-home sidebar-menu-icon"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-folder sidebar-menu-icon"></i>
                    File Browser
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-database sidebar-menu-icon"></i>
                    Databases
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-terminal sidebar-menu-icon"></i>
                    Terminal
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-network-wired sidebar-menu-icon"></i>
                    Network
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog sidebar-menu-icon"></i>
                    Settings
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <div class="server-status">
                <span class="status-badge status-active">
                    <i class="fas fa-circle"></i> Server Running
                </span>
            </div>
            <div>LocalDev v2.4.1</div>
            <div>&copy; 2025 LocalDev Team</div>
        </div>
    </div>
    
    <div class="main-content">
        <div class="header">
            <h1>Local Development Server</h1>
            <button class="dark-mode-toggle" id="darkModeToggle">
                <i class="fas fa-moon"></i> Dark Mode
            </button>
        </div>
        
        <div class="quick-actions">
            <div class="quick-action" id="restartServer">
                <i class="fas fa-sync-alt"></i>
                <div class="quick-action-title">Restart Server</div>
                <div class="quick-action-desc">Apply configuration changes</div>
            </div>
            <div class="quick-action" id="openTerminal">
                <i class="fas fa-terminal"></i>
                <div class="quick-action-title">Terminal</div>
                <div class="quick-action-desc">Open command line</div>
            </div>
            <div class="quick-action" id="phpInfo">
                <i class="fab fa-php"></i>
                <div class="quick-action-title">PHP Info</div>
                <div class="quick-action-desc">View PHP configuration</div>
            </div>
            <div class="quick-action" id="openWebroot">
                <i class="fas fa-folder-open"></i>
                <div class="quick-action-title">Open Webroot</div>
                <div class="quick-action-desc">Access document root</div>
            </div>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Memory Usage</div>
                <div class="stat-value"><?= round(memory_get_usage(true) / (1024 * 1024), 2) ?> MB</div>
                <div class="stat-change up">
                    <i class="fas fa-arrow-up"></i> 2.5% from last hour
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">CPU Load</div>
                <div class="stat-value"><?= sys_getloadavg()[0] ?? 'N/A' ?></div>
                <div class="stat-change down">
                    <i class="fas fa-arrow-down"></i> 1.2% from last hour
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Requests</div>
                <div class="stat-value">1,248</div>
                <div class="stat-change up">
                    <i class="fas fa-arrow-up"></i> 12% from yesterday
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Uptime</div>
                <div class="stat-value">3d 14h</div>
                <div class="stat-change up">
                    <i class="fas fa-check-circle"></i> Stable
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-server"></i> Server Status</h2>
                <div class="btn-group">
                    <button class="btn btn-success btn-sm" id="startServer">
                        <i class="fas fa-play"></i> Start
                    </button>
                    <button class="btn btn-danger btn-sm" id="stopServer">
                        <i class="fas fa-stop"></i> Stop
                    </button>
                    <button class="btn btn-warning btn-sm" id="restartServerBtn">
                        <i class="fas fa-sync-alt"></i> Restart
                    </button>
                </div>
            </div>
            
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 65%"></div>
                </div>
                <div class="progress-info">
                    <span>Resource Usage</span>
                    <span>65%</span>
                </div>
            </div>
            
            <div class="server-info-grid">
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-code-branch"></i> Apache Version</div>
                    <div><?= apache_get_version() ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fab fa-php"></i> PHP Version</div>
                    <div><?= phpversion() ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-folder"></i> Server Root</div>
                    <div>/opt/homebrew/opt/httpd</div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-file-code"></i> Document Root</div>
                    <div><?= $_SERVER['DOCUMENT_ROOT'] ?? '/Library/WebServer/Documents' ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-link"></i> Local URL</div>
                    <div><a href="http://localhost:8080">http://localhost:8080</a></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-network-wired"></i> Network URL</div>
                    <div><a href="http://<?= $_SERVER['SERVER_ADDR'] ?? '127.0.0.1' ?>">http://<?= $_SERVER['SERVER_ADDR'] ?? '127.0.0.1' ?></a></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-microchip"></i> PHP Memory Limit</div>
                    <div><?= ini_get('memory_limit') ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label"><i class="fas fa-clock"></i> Max Execution Time</div>
                    <div><?= ini_get('max_execution_time') ?>s</div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-folder-open"></i> File Browser</h2>
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm" id="uploadFile">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                    <button class="btn btn-sm" id="newFolder">
                        <i class="fas fa-plus"></i> New Folder
                    </button>
                    <button class="btn btn-secondary btn-sm" id="refreshFiles">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
            </div>
            
            <div class="breadcrumb">
                <span class="breadcrumb-item"><i class="fas fa-home"></i> /</span>
                <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="breadcrumb-item">Library</span>
                <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="breadcrumb-item">WebServer</span>
                <span class="breadcrumb-separator"><i class="fas fa-chevron-right"></i></span>
                <span class="breadcrumb-item">Documents</span>
            </div>
            
            <div class="file-browser">
                <table class="file-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Modified</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dir = new DirectoryIterator($_SERVER['DOCUMENT_ROOT']);
                        foreach ($dir as $fileinfo) {
                            if ($fileinfo->isDot()) continue;
                            
                            $name = $fileinfo->getFilename();
                            $path = $fileinfo->getPathname();
                            $size = $fileinfo->isDir() ? '-' : formatBytes($fileinfo->getSize());
                            $modified = date('Y-m-d H:i', $fileinfo->getMTime());
                            $icon = $fileinfo->isDir() ? 'fa-folder' : getFileIcon($name);
                            
                            echo "<tr data-path='$path'>";
                            echo "<td><i class='fas $icon file-icon'></i>$name</td>";
                            echo "<td>$size</td>";
                            echo "<td>$modified</td>";
                            echo "<td>";
                            echo "<i class='fas fa-eye file-action' title='View'></i>";
                            echo "<i class='fas fa-edit file-action' title='Edit'></i>";
                            echo "<i class='fas fa-download file-action' title='Download'></i>";
                            echo "<i class='fas fa-trash file-action file-action-danger' title='Delete'></i>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        
                        function formatBytes($bytes, $precision = 2) {
                            $units = ['B', 'KB', 'MB', 'GB', 'TB'];
                            $bytes = max($bytes, 0);
                            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                            $pow = min($pow, count($units) - 1);
                            $bytes /= pow(1024, $pow);
                            return round($bytes, $precision) . ' ' . $units[$pow];
                        }
                        
                        function getFileIcon($filename) {
                            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            $iconMap = [
                                'php' => 'fa-file-code',
                                'html' => 'fa-file-code',
                                'htm' => 'fa-file-code',
                                'css' => 'fa-file-code',
                                'js' => 'fa-file-code',
                                'json' => 'fa-file-code',
                                'md' => 'fa-file-alt',
                                'txt' => 'fa-file-alt',
                                'pdf' => 'fa-file-pdf',
                                'jpg' => 'fa-file-image',
                                'jpeg' => 'fa-file-image',
                                'png' => 'fa-file-image',
                                'gif' => 'fa-file-image',
                                'svg' => 'fa-file-image',
                                'zip' => 'fa-file-archive',
                                'rar' => 'fa-file-archive',
                                'tar' => 'fa-file-archive',
                                'gz' => 'fa-file-archive',
                                'sql' => 'fa-database',
                                'csv' => 'fa-file-csv',
                                'xls' => 'fa-file-excel',
                                'xlsx' => 'fa-file-excel',
                                'doc' => 'fa-file-word',
                                'docx' => 'fa-file-word',
                                'ppt' => 'fa-file-powerpoint',
                                'pptx' => 'fa-file-powerpoint'
                            ];
                            
                            return $iconMap[$extension] ?? 'fa-file';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><i class="fas fa-info-circle"></i> System Information</h2>
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm" id="refreshSystemInfo">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                    <button class="btn btn-sm" id="exportConfig">
                        <i class="fas fa-download"></i> Export
                    </button>
                </div>
            </div>
            
            <div class="tab-container">
                <div class="tabs">
                    <div class="tab active" data-tab="php"><i class="fab fa-php"></i> PHP Configuration</div>
                    <div class="tab" data-tab="apache"><i class="fas fa-server"></i> Apache Modules</div>
                    <div class="tab" data-tab="system"><i class="fas fa-desktop"></i> System Info</div>
                    <div class="tab" data-tab="phpinfo"><i class="fas fa-info"></i> phpInfo()</div>
                </div>
                
                <div class="tab-content active" id="php-tab">
                    <pre><?= highlight_string("<?php\n" . print_r(ini_get_all(), true), true) ?></pre>
                </div>
                
                <div class="tab-content" id="apache-tab">
                    <pre><?= print_r(apache_get_modules(), true) ?></pre>
                </div>
                
                <div class="tab-content" id="system-tab">
                    <pre>System: <?= php_uname() ?>

Build Date: <?= date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'] ?? time()) ?>
Build System: <?= php_uname('s') ?> <?= php_uname('r') ?>
Build Provider: Homebrew
Server API: <?= php_sapi_name() ?>
PHP API: <?= PHP_API_VERSION ?>
Zend Extension Build: <?= ZEND_EXTENSION_BUILD_ID ?>
Debug Build: <?= defined('PHP_DEBUG') && PHP_DEBUG ? 'yes' : 'no' ?>
Thread Safety: <?= ZEND_THREAD_SAFE ? 'enabled' : 'disabled' ?>
IPv6 Support: <?= extension_loaded('sockets') && defined('AF_INET6') ? 'enabled' : 'disabled' ?>
DTrace Support: <?= function_exists('dtrace') ? 'available' : 'not available' ?></pre>
                </div>
                
                <div class="tab-content" id="phpinfo-tab">
                    <div class="btn-group" style="margin-bottom: 1rem;">
                        <button class="btn btn-sm" id="viewPhpInfo">
                            <i class="fas fa-external-link-alt"></i> View Full phpInfo()
                        </button>
                    </div>
                    <div style="background: var(--card-bg); padding: 1rem; border-radius: 0.5rem; border: 1px solid var(--border-color);">
                        <p>Click the button above to view the complete phpInfo() output in a new window.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <div class="toast-message">Operation completed successfully</div>
    </div>

    <div class="context-menu" id="contextMenu">
        <div class="context-menu-item" data-action="view"><i class="fas fa-eye"></i> View</div>
        <div class="context-menu-item" data-action="edit"><i class="fas fa-edit"></i> Edit</div>
        <div class="context-menu-item" data-action="download"><i class="fas fa-download"></i> Download</div>
        <div class="context-menu-divider"></div>
        <div class="context-menu-item" data-action="rename"><i class="fas fa-i-cursor"></i> Rename</div>
        <div class="context-menu-item" data-action="delete"><i class="fas fa-trash"></i> Delete</div>
        <div class="context-menu-divider"></div>
        <div class="context-menu-item" data-action="properties"><i class="fas fa-info-circle"></i> Properties</div>
    </div>

    <script>
        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        // Check for saved user preference or use system preference
        const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        const currentTheme = localStorage.getItem('theme');
        
        if (currentTheme === 'dark' || (!currentTheme && prefersDarkScheme.matches)) {
            body.classList.add('dark-mode');
            darkModeToggle.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
        }
        
        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            darkModeToggle.innerHTML = isDark
                ? '<i class="fas fa-sun"></i> Light Mode'
                : '<i class="fas fa-moon"></i> Dark Mode';
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
        
        // Tab functionality
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and contents
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });
        
        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastIcon = toast.querySelector('i');
            const toastMessage = toast.querySelector('.toast-message');
            
            // Set toast content and style based on type
            toast.className = `toast ${type}`;
            toastMessage.textContent = message;
            
            // Set appropriate icon
            const icons = {
                success: 'fa-check-circle',
                error: 'fa-times-circle',
                warning: 'fa-exclamation-triangle',
                info: 'fa-info-circle'
            };
            toastIcon.className = `fas ${icons[type]}`;
            
            // Show toast
            toast.classList.add('show');
            
            // Hide after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
        
        // Context menu
        const contextMenu = document.getElementById('contextMenu');
        let selectedFile = null;
        
        document.addEventListener('contextmenu', (e) => {
            const fileRow = e.target.closest('tr[data-path]');
            if (fileRow) {
                e.preventDefault();
                selectedFile = fileRow.getAttribute('data-path');
                
                // Position the context menu
                contextMenu.style.display = 'block';
                contextMenu.style.left = `${Math.min(e.pageX, window.innerWidth - contextMenu.offsetWidth - 10)}px`;
                contextMenu.style.top = `${Math.min(e.pageY, window.innerHeight - contextMenu.offsetHeight - 10)}px`;
            }
        });
        
        // Close context menu when clicking elsewhere
        document.addEventListener('click', () => {
            contextMenu.style.display = 'none';
        });
        
        // Context menu actions
        document.querySelectorAll('.context-menu-item').forEach(item => {
            item.addEventListener('click', () => {
                const action = item.getAttribute('data-action');
                if (selectedFile) {
                    showToast(`"${action}" action triggered for ${selectedFile}`, 'info');
                }
                contextMenu.style.display = 'none';
            });
        });
        
        // Button actions
        document.getElementById('startServer').addEventListener('click', () => {
            showToast('Server started successfully', 'success');
        });
        
        document.getElementById('stopServer').addEventListener('click', () => {
            showToast('Server stopped successfully', 'success');
        });
        
        document.getElementById('restartServerBtn').addEventListener('click', () => {
            showToast('Server restarted successfully', 'success');
        });
        
        document.getElementById('uploadFile').addEventListener('click', () => {
            showToast('Upload file dialog opened', 'info');
        });
        
        document.getElementById('newFolder').addEventListener('click', () => {
            showToast('New folder created', 'success');
        });
        
        document.getElementById('refreshFiles').addEventListener('click', () => {
            showToast('File list refreshed', 'info');
        });
        
        document.getElementById('viewPhpInfo').addEventListener('click', () => {
            window.open('<?= $_SERVER['PHP_SELF'] ?>?phpinfo=1', '_blank');
        });
        
        // Quick actions
        document.getElementById('restartServer').addEventListener('click', () => {
            showToast('Server restart initiated', 'warning');
        });
        
        document.getElementById('openTerminal').addEventListener('click', () => {
            showToast('Terminal session opened', 'info');
        });
        
        document.getElementById('phpInfo').addEventListener('click', () => {
            document.querySelector('.tab[data-tab="phpinfo"]').click();
        });
        
        document.getElementById('openWebroot').addEventListener('click', () => {
            showToast('Webroot directory opened', 'info');
        });
        
        // File table row click
        document.querySelectorAll('.file-table tbody tr').forEach(row => {
            row.addEventListener('dblclick', () => {
                const path = row.getAttribute('data-path');
                const isDir = row.querySelector('.fa-folder') !== null;
                
                if (isDir) {
                    showToast(`Opening directory: ${path}`, 'info');
                } else {
                    showToast(`Opening file: ${path}`, 'info');
                }
            });
        });
        
        // File action buttons
        document.querySelectorAll('.file-action').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const action = btn.classList.contains('fa-eye') ? 'view' :
                               btn.classList.contains('fa-edit') ? 'edit' :
                               btn.classList.contains('fa-download') ? 'download' :
                               btn.classList.contains('fa-trash') ? 'delete' : '';
                               
                const fileRow = btn.closest('tr');
                const path = fileRow.getAttribute('data-path');
                
                if (action === 'delete') {
                    if (confirm(`Are you sure you want to delete ${path}?`)) {
                        showToast(`Deleted: ${path}`, 'success');
                        // In a real app, you would make an AJAX call to delete the file
                    }
                } else {
                    showToast(`${action.charAt(0).toUpperCase() + action.slice(1)}: ${path}`, 'info');
                }
            });
        });
        
        // Simulate loading for server stats
        setInterval(() => {
            const memoryStat = document.querySelector('.stat-card:nth-child(1) .stat-value');
            const cpuStat = document.querySelector('.stat-card:nth-child(2) .stat-value');
            
            // Random fluctuations for demo purposes
            const currentMemory = parseFloat(memoryStat.textContent);
            const newMemory = (currentMemory + (Math.random() * 2 - 1)).toFixed(2);
            memoryStat.textContent = `${newMemory} MB`;
            
            const currentCpu = parseFloat(cpuStat.textContent);
            const newCpu = (currentCpu + (Math.random() * 0.2 - 0.1)).toFixed(2);
            cpuStat.textContent = newCpu;
        }, 5000);
    </script>
    
    <?php
    // Display phpInfo if requested
    if (isset($_GET['phpinfo'])) {
        phpinfo();
        exit;
    }
    ?>
</body>
</html>
