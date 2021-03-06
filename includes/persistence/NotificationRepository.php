<?php

interface WPNotify_NotificationRepository {

	/**
	 * Find a notification by ID.
	 *
	 * @param int $id ID to look for.
	 *
	 * @return WPNotify_Notification|false Notification that matches the ID, or
	 *                                     false if not found.
	 */
	public function find_by_id( $id );

	/**
	 * Find all notifications for a given recipient.
	 *
	 * @param WPNotify_Recipient $recipient  Recipient to retrieve the
	 *                                       notifications for.
	 * @param int                $pagination Optional. Number of elements per
	 *                                       page. Defaults to 10.
	 * @param int                $offset     Optional. Offset into the result
	 *                                       set. Defaults to 0.
	 *
	 * @return WPNotify_Notification[] Array of notifications, empty array if
	 *                                 none found.
	 */
	public function find_by_recipient(
		WPNotify_Recipient $recipient,
		$pagination = 10,
		$offset = 0
	);

	/**
	 * Find all notifications for a given date period.
	 *
	 * @param DateTimeInterface $start      Start date of the date range.search.
	 * @param DateTimeInterface $end        End date of the date range.search.
	 * @param string            $order      Optional. Sorting order, defaults
	 *                                      to
	 *                                      descending.
	 * @param int               $pagination Optional. Number of elements per
	 *                                      page. Defaults to 10.
	 * @param int               $offset     Optional. Offset into the result
	 *                                      set. Defaults to 0.
	 *
	 * @return WPNotify_Notification[] Array of notifications, empty array if
	 *                                 none found.
	 */
	public function find_by_date_range(
		DateTimeInterface $start,
		DateTimeInterface $end,
		$order = WPNotify_Order::DESCENDING,
		$pagination = 10,
		$offset = 0
	);

	/**
	 * Find the latest notifications for a given date range.
	 *
	 * @param DateInterval $interval   Time interval to search.
	 * @param int          $pagination Optional. Number of elements per page.
	 *                                 Defaults to 10.
	 * @param int          $offset     Optional. Offset into the result set.
	 *                                 Defaults to 0.
	 *
	 * @return WPNotify_Notification[] Array of notifications, empty array if
	 *                                 none found.
	 */
	public function find_latest(
		DateInterval $interval,
		$pagination = 10,
		$offset = 0
	);

	/**
	 * Add a new notification to the repository.
	 *
	 * @param WPNotify_Notification $notification Notification to add.
	 *
	 * @return int ID that the notification was stored under.
	 */
	public function add( WPNotify_Notification $notification );
}
