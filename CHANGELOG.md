# Jumpstart UI


8.x-1.22
--------------------------------------------------------------------------------
_Release Date: 2022-05-02_

- D8CORE-4728: updated decanter version (#126)


8.x-1.21
--------------------------------------------------------------------------------
_Release Date: 2022-03-17_

- Removed D8 Tests
- Added jumpstart_ui components namespace


8.x-1.20
--------------------------------------------------------------------------------
_Release Date: 2021-11-19_

- D8CORE-4786 Use the line 1 for the image alt (#116)
- D8CORE-4802 D8CORE-4823: updating the decanter version (#117)

8.x-1.19
--------------------------------------------------------------------------------
_Release Date: 2021-08-11_

- CAW21-81 Build accordion pattern (#111)

8.x-1.18
--------------------------------------------------------------------------------
_Release Date: 2021-07-09_

- D8CORE-4362 Remove empty <ul> tag in local footer template (#108) (58b2cf2)
- D8CORE-4194 Use a regular link markup and stretch it over the image (#101) (8e0b21c)
- D8CORE-4378: removing the name attribute from the skip to main target (#107) (b379062)

8.x-1.16
--------------------------------------------------------------------------------
_Release Date: 2021-05-07_

- D8CORE-2729 Allow hero banner overlay to positioned on the right (#96) (53b987d)

8.x-1.15
--------------------------------------------------------------------------------
_Release Date: 2021-04-09_

- D8CORE-2444: Changing the anchor to a div for the landing of the anchor (#93) (c386df0)

8.x-1.14
--------------------------------------------------------------------------------
_Release Date: 2021-03-05_

- Update components namespace for latest components version (#88) (fbd8346)
- D8CORE-3493 D8CORE-3513 Wysiwyg video style fixes (#89) (90f3780)
- updated circleci tests (#86) (aaf850b)

8.x-1.13
--------------------------------------------------------------------------------
_Release Date: 2020-12-04_

- D8CORE-2529: Fixing the media with link or no link. (#84) (8da65db)
- apply aspect ratio only to videos (0531982)
- Fixed the iframe aspect ratio styles to avoid conflicts (#83) (4688e89)
- D8CORE-2105 Upgrade decanter to 6.2.0 (#82) (4cfdb62)
- D8CORE-3042 Adjusted css for youtube videos in paragraph types (#81) (2193286)
- Adjusted tests to pass on D9 (#80) (2b1378e)
- phpunit void return annoation (30c5eb7)
- resolved failing test (5ca4828)
- Fixed breaking logic in render_clean twig filter (1829784)
- D8CORE-000 Add filter to render and clean an array (#78) (e20d608)

8.x-1.12
--------------------------------------------------------------------------------
_Release Date: 2020-09-24_

- D8CORE-2498 D8CORE-2496 Fix link urls in the local footer (#76)


8.x-1.11
--------------------------------------------------------------------------------
_Release Date: 2020-09-09_

- D8CORE-2376: Overrides local footer lockup (#73) (57f4543)
- D8CORE-2490 D8CORE-1609: Global Elements (#72) (9abc078)
- D8CORE-2534: URL encode link in card component. (#71) (64ddbe9)
- D8CORE-2499 Updated composer license (#70) (a2f7a09)
- CSD-000 Added jumpstart-ui column class (#69) (e2b63fd)

8.x-1.10
--------------------------------------------------------------------------------
_Release Date: 2020-08-13_

- Corrected template markup that was stripping links in card pattern headline.

8.x-1.9
--------------------------------------------------------------------------------
_Release Date: 2020-08-07_

- D8CORE-1726: making sure the h2 does not show as empty tags (#66) (9a9ea46)
- D8CORE-2047: the organization in the address is not a heading. Reduce the font so it doesn't look like one. (#64) (7ee02e4)
- Bump lodash from 4.17.15 to 4.17.19 (#63) (0d0c556)

8.x-1.8
--------------------------------------------------------------------------------
_Release Date: 2020-07-13_

- D8CORE-1538: Convert behat tests to codeception (#61) (218a01d)
- D8CORE-1866 Convert special characters for the banner link pattern (#60) (b242ba6)

8.x-1.7
--------------------------------------------------------------------------------
_Release Date: 2020-06-17_

- Add settings.extra_classes to one column with an overlay layout (#57) (87a4c72)

8.x-1.6
--------------------------------------------------------------------------------
_Release Date: 2020-05-15_

- Add custom page title block. (#55) (acc395e)
- Added a one column with an overlay layout (#54) (ee6e0ba)
- Add max columns for one column layout. (#53) (986302f)

8.x-1.5
--------------------------------------------------------------------------------
_Release Date: 2020-04-16_

- Updated layouts & Kernel Tests For All The Layouts (#44)
- DCORE-1504: Ensure unique id's in the media template. (#46)
- CSD-19 Added configurable orientation to the two column layout. (#48)
- D8CORE-1644: Dev branch workflow. Created master branch, changed the release workflow, added automated tagging
- Fixed prepocess hook logic to prevent unwanted alters (#50)
- D8CORE-1847 Decode html entities (#51)

8.x-1.4
--------------------------------------------------------------------------------
_Release Date: 2020-02-27_

- D8CORE-1427: Remove render array junk when checking for empty on hero_link variable in hero.html.twig template. (#35)
- D8CORE-1457: Allow special chars in urls. (#38)
- D8CORE-1327: fixing the footer for special characters (#39)
- Update to Decanter 6.0.4 (#36)
- Change to three column class selector. (#40)
- Decanter Version 6.0.5 (#41)
- D8CORE-1291: IE fixes (#43)

8.x-1.3
--------------------------------------------------------------------------------
_Release Date: 2020-02-21_

- D8CORE-1398: Fix broken link mapping for hero buttons

8.x-1.2
--------------------------------------------------------------------------------
_Release Date: 2020-02-19_

- D8CORE-106: Media with caption paragraph (#20)

8.x-1.1
--------------------------------------------------------------------------------
_Release Date: 2020-02-14_

- Don't add the login link to the local footer pattern for logged in users.
- D8CORE-1233: Cannot assume attributes is being passed in. (#26)
- Bugfix: jumpstart-ui--three-column to jumpstart-ui--two-column (#27)

8.x-1.0
--------------------------------------------------------------------------------
_Release Date: 2020-02-05_

- Updated to use Decanter version 6.0.1
- D8CORE-714: Ensure no duplicate attributes on components
- D8CORE-931: Skip Links
- D8CORE-1250: Changed aside and section tags to divs since cannot predict content and using semantics wrong


8.x-1.0-alpha4
--------------------------------------------------------------------------------
_Release Date: 2020-01-22_

- D8CORE-972: Ensure object-fit model for media component video
- D8CORE-1010: Update to Decanter version 6.0.1
- D8CORE-1010: Removed Decanter layout templates
- D8CORE-1010: Updates to webpack build.
- D8CORE-1010: Updates to postcss.config.js file
- Overrode the block_card_media twig block in card.html.twig
- Updates to card pattern fields (regions). New items only.
- New Decanter component: date-stacked
- New Decanter component: media
- Layout templates three/two-column.html.twig now collapse sidebar at lg breakpoint to match when the mobile nav is available.

8.x-1.0-alpha3
--------------------------------------------------------------------------------
_Release Date: 2019-12-05_

- D8CORE-726 Wired up local footer template from Decanter as a pattern.
- D8CORE-859 Card video styles for media/video

8.x-1.0-alpha2
--------------------------------------------------------------------------------
- D8CORE-387 Dynamic layouts: Removed all Decanter Grid layouts in favor of a few
configurable layouts.
- Requires Drupal ^8.8
- Caravan running with latest-drupal now

8.x-1.0-alpha1
--------------------------------------------------------------------------------
_Release Date: 2019-10-30_

- Initial Release.
