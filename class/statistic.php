<?php require_once("../../connection.php");

class statistic
{
  function GetMonthlyIncome($Date)
  {
    $connect = connection();
    $query = mysqli_query($connect, 'select t1.month,
    t1.md,
    coalesce(SUM(t1.amount+t2.amount), 0) AS total
    from
    (
      select DATE_FORMAT(a.Date,"%b") as month,
      DATE_FORMAT(a.Date, "%Y-%m") as md,
      "0" as  amount
      from (
        select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
        from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
        cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
        cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
      ) a
      where a.Date <= date("' . $Date . '") and a.Date >= Date_add(date("' . $Date . '"),interval - 11 month)
      group by md
    )t1
    left join
    (
      SELECT DATE_FORMAT(OrderDate, "%b") AS month, SUM(TotalPrice) as amount ,DATE_FORMAT(OrderDate, "%Y-%m") as md
      FROM orders
      where OrderDate <= date("' . $Date . '") and OrderDate >= Date_add(date("' . $Date . '"),interval - 11 month)
      GROUP BY md
    )t2
    on t2.md = t1.md 
    group by t1.md
    order by t1.md asc');
    $Array = array();
    while ($Row = mysqli_fetch_assoc($query)) {
      $Array[] = $Row;
    }
    return $Array;
  }
  function GetMonthlyOrder($Date)
  {
    $connect = connection();
    $query = mysqli_query($connect, 'select t1.month,
    t1.md,
    coalesce(SUM(t1.amount+t2.amount), 0) AS total
    from
    (
      select DATE_FORMAT(a.Date,"%b") as month,
      DATE_FORMAT(a.Date, "%Y-%m") as md,
      "0" as  amount
      from (
        select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
        from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
        cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
        cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
      ) a
      where a.Date <= date("' . $Date . '") and a.Date >= Date_add(date("' . $Date . '"),interval - 11 month)
      group by md
    )t1
    left join
    (
      SELECT DATE_FORMAT(OrderDate, "%b") AS month, COUNT(*) as amount ,DATE_FORMAT(OrderDate, "%Y-%m") as md
      FROM orders
      where OrderDate <= date("' . $Date . '") and OrderDate >= Date_add(date("' . $Date . '"),interval - 11 month)
      GROUP BY md
    )t2
    on t2.md = t1.md 
    group by t1.md
    order by t1.md asc');
    $Array = array();
    while ($Row = mysqli_fetch_assoc($query)) {
      $Array[] = $Row;
    }
    return $Array;
  }

  function GetMonthlyTicket($Date)
  {
    $connect = connection();
    $query = mysqli_query($connect, 'select t1.month,
        t1.md,
        coalesce(SUM(t1.amount+t2.amount), 0) AS total
        from
        (
          select DATE_FORMAT(a.Date,"%b") as month,
          DATE_FORMAT(a.Date, "%m-%Y") as md,
          "0" as  amount
          from (
            select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
            from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
            cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
            cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
          ) a
          where a.Date <= date("' . $Date . '") and a.Date >= Date_add(date("' . $Date . '"),interval - 11 month)
          group by md
        )t1
        left join
        (
          SELECT DATE_FORMAT(OrderDate, "%b") AS month, COUNT(*) as amount ,DATE_FORMAT(OrderDate, "%m-%Y") as md
          FROM orders, orderdetails od
          where OrderDate <= date("' . $Date . '") and OrderDate >= Date_add(date("' . $Date . '"),interval - 11 month) and orders.OrderID = od.OrderID
          GROUP BY md
        )t2
        on t2.md = t1.md 
        group by t1.md
        order by t1.md');
    $Array = array();
    while ($Row = mysqli_fetch_assoc($query)) {
      $Array[] = $Row;
    }
    return $Array;
  }

  function GetTicketType()
  {
    $connect = connection();
    $query = mysqli_query($connect, 'select Class, count(*) as Ticket from orderdetails group by Class');
    $Array = array();
    while ($Row = mysqli_fetch_assoc($query)) {
      $Array[] = $Row;
    }
    return $Array;
  }
}

$OtatisticObject = new statistic();
