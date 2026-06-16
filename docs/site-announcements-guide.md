# Site Announcements Admin Guide

This guide explains how to use the **Site Announcements** feature in the admin panel.

## What this feature does

Site Announcements let admin managers publish urgent or important messages on the public website without changing page content manually.

You can display an announcement in three ways:

- `Popup` - a modal that appears on page load
- `Top Bar` - a compact banner fixed across the top of the site
- `Slide-in` - a small panel that appears from the bottom-right corner

## Where to manage it

In the admin panel, go to:

- `Content Management`
- `Site Announcements`

From there you can create new announcements, edit existing ones, or disable old ones.

## Creating an announcement

1. Open `Site Announcements`.
2. Click `Create`.
3. Fill in the announcement content.
4. Choose the display mode.
5. Set the schedule and visibility.
6. Save the record.

## Field guide

### Announcement Content

- `Badge`
  - Short label shown before the announcement title.
  - Example: `Important alert`, `New circular`, `Notice`.
- `Title`
  - Main heading shown to visitors.
- `Message`
  - Main announcement text.
  - Keep it short and direct.
- `Image`
  - Optional image for richer announcements.
  - Works best for popup and slide-in layouts.

### Call to Action

- `Primary CTA Label`
  - Button text for the main action.
  - Example: `Read Circular`, `View Details`, `Download PDF`.
- `Primary CTA URL`
  - Destination for the main action.
- `Open primary CTA in new tab`
  - Turn on if the link should open in a new browser tab.
- `Secondary CTA Label`
  - Optional second button.
  - Example: `Learn More`, `Contact Us`.
- `Secondary CTA URL`
  - Destination for the second action.

### Display Rules

- `Display Mode`
  - Controls how the announcement appears on the site.
  - `Popup` is best for urgent notices.
  - `Top Bar` is best for compact alerts.
  - `Slide-in` is best for medium-priority notices with more detail.
- `Style`
  - Controls the color tone of the announcement.
  - Common choices: `Warning`, `Info`, `Success`, `Danger`.
- `Priority`
  - Higher numbers appear before lower numbers when more than one active record exists.
- `Dismiss for Hours`
  - How long the site waits before showing the same announcement again after it is dismissed.
- `Start At`
  - Optional start date and time.
  - The announcement will not appear before this time.
- `End At`
  - Optional end date and time.
  - The announcement will stop appearing after this time.
- `Show on homepage`
  - Restrict the announcement to the homepage only.
- `Show on all pages`
  - Allow the announcement on the full website.
- `Dismissible`
  - Lets visitors close the announcement.
- `Show once per session`
  - Shows the announcement one time per browser session.
- `Active`
  - Must be enabled for the announcement to appear publicly.

## Choosing the right display mode

### Popup

Use for:

- emergency notices
- important policy updates
- urgent circulars
- time-sensitive public alerts

Best practice:

- keep the message short
- use a clear CTA
- do not use too often

### Top Bar

Use for:

- compact announcements
- service interruptions
- brief reminders
- daily or weekly notices

Best practice:

- keep the text short
- use one primary CTA
- avoid long paragraphs

### Slide-in

Use for:

- featured documents
- event promotions
- circulars with a bit more detail
- announcements that should be visible but not disruptive

Best practice:

- add an image when helpful
- keep the wording concise
- use a strong CTA

## Recommended workflow for admin managers

1. Draft the announcement text first.
2. Choose the right mode.
3. Set the style color to match the urgency.
4. Add one strong CTA.
5. Add an end time if the message is temporary.
6. Preview the public site after saving.
7. Disable the announcement once it is no longer needed.

## Suggested usage policy

To avoid irritating visitors:

- use `Popup` only for high-priority alerts
- use `Top Bar` for short, ongoing notices
- use `Slide-in` for featured content or secondary notices
- keep only one active urgent announcement at a time

## Notes

- If you edit an existing announcement, the updated version can appear again because the dismissal state is versioned.
- If an announcement is disabled, it will stop appearing immediately.
- If a popup includes a CTA, make sure the link goes to the next useful step for the user.

## Example announcements

### Example 1: Urgent circular

- Badge: `New circular`
- Title: `Office Circular on Updated Service Hours`
- Message: `Please note the revised service hours effective from Monday.`
- Display Mode: `Popup`
- Style: `Warning`
- CTA Label: `Read Circular`
- CTA URL: `/documents?category=circulars`

### Example 2: Public notice

- Badge: `Notice`
- Title: `Planned Maintenance Notice`
- Message: `The website will undergo scheduled maintenance tonight.`
- Display Mode: `Top Bar`
- Style: `Info`
- CTA Label: `View Details`
- CTA URL: `/news/planned-maintenance`

### Example 3: Featured event

- Badge: `Event`
- Title: `Upcoming Public Event`
- Message: `Join us for the official event next week.`
- Display Mode: `Slide-in`
- Style: `Success`
- CTA Label: `See Event`
- CTA URL: `/upcoming`

