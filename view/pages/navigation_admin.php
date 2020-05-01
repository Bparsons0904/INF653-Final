<nav id="admin-nav">
    <div class="header">
        <a href="admin.php" class="">
            Daily Quotes
        </a>
        <div class="links">
            <form action="admin.php"  id="admin-control">
                <input type="hidden" name="action" id="admin-input" value="">
                <div onclick="navControl('approvals')">Approvals</div>
                <div onclick="navControl('logout')">Logout</div>
            </form>

        </div>
    </div>
</nav>